<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\HR\Entities\AccountDetail;
use App\Models\Notification;
use App\Models\Role;
use Modules\HR\Http\Requests\Destroy\MassDestroyLeaveApplicationRequest;
use Modules\HR\Http\Requests\Store\StoreLeaveApplicationRequest;
use Modules\HR\Http\Requests\Update\UpdateLeaveApplicationRequest;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\LeaveCategory;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Modules\HR\Emails\LeaveRequest;
use Modules\HR\Entities\Department;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LeaveApplicationsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('leave_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            if ($request->get('leaveTypes') == 'myLeaves') {
                $query = LeaveApplication::where('user_id', auth()->user()->id)->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
            }elseif($request->get('leaveTypes') == 'pending') {

                $isDepartmentHead = Department::where('department_head_id', auth()->user()->id)->first();
                if (User::authUserRole() == 'Board Members' || User::authUserRole() == 'Admin') {
                    // All pending leaves for board and admin
                    $query = LeaveApplication::where('application_status', 'pending')->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }elseif ($isDepartmentHead) {
                    $leaveAppIds = [];
                    $designations = $isDepartmentHead->departmentDesignations()->pluck('id')->toArray();
                    foreach (LeaveApplication::where('application_status', 'pending')->get() as $key => $value) {
                        $userDesignation = AccountDetail::select('designation_id')->find($value->user_id);
                        if (in_array($userDesignation->designation_id, $designations))
                        {
                            $leaveAppIds[] = $value->id;
                        }
                    }
                    // Shows only users pending leaves having designation in which head department is responsible for.
                    $query = LeaveApplication::whereIn('id', $leaveAppIds)->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }else{
                    // Only Users leaves
                    $query = LeaveApplication::where('user_id', auth()->user()->id)->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }
            }else{
                // All Leaves

                $isDepartmentHead = Department::where('department_head_id', auth()->user()->id)->first();
                if (User::authUserRole() == 'Board Members' || User::authUserRole() == 'Admin') {
                    // All pending leaves for board and admin
                    $query = LeaveApplication::with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }elseif ($isDepartmentHead) {
                    $leaveAppIds = [];
                    $designations = $isDepartmentHead->departmentDesignations()->pluck('id')->toArray();
                    foreach (LeaveApplication::all() as $key => $value) {
                        $userDesignation = AccountDetail::select('designation_id')->find($value->user_id);
                        if (in_array($userDesignation->designation_id, $designations))
                        {
                            $leaveAppIds[] = $value->id;
                        }
                    }
                    // Shows only users pending leaves having designation in which head department is responsible for.
                    $query = LeaveApplication::whereIn('id', $leaveAppIds)->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }else{
                    $query = LeaveApplication::where('user_id', auth()->user()->id)->with(['leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }

                // All Leaves
                // $query = LeaveApplication::with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->addColumn('status_color', '&nbsp;');

            $table->editColumn('actions', function ($row) use ($request){
                if ($request->get('trashed')) {
                    $viewGate      = '';
                    $editGate      = '';
                    $deleteGate    = 'leave_application_delete';
                    $deleteRestore    = 'delete_restore';
                    $modalId       = 'hr.';
                    $crudRoutePart = 'leave-applications';

                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'editGate',
                        'deleteGate',
                        'deleteRestore',
                        'modalId',
                        'crudRoutePart',
                        'row'
                    ));
                }else{
                    $viewGate      = 'leave_application_show';
                    $editGate      = 'leave_application_edit';
                    $deleteGate    = 'leave_application_delete';
                    $modalId       = 'hr.';
                    $crudRoutePart = 'leave-applications';

                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'editGate',
                        'deleteGate',
                        'modalId',
                        'crudRoutePart',
                        'row'
                    ));
                }

            })->filter(function ($instance) use ($request) {
                if ($request->get('trashed')) {
                    $instance->onlyTrashed();
                }else{
                    $instance->where('deleted_at', NULL);
                }
            })
            ->rawColumns(['status']);

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('leave_category_name', function ($row) {
                return $row->leave_category ? $row->leave_category->name : '';
            });
            $table->editColumn('hours', function ($row) {
                return $row->hours ? $row->hours : "";
            });
            $table->editColumn('leave_start_date', function ($row) {
                return $row->leave_start_date ? $row->leave_start_date : "";
            });
            $table->editColumn('leave_end_date', function ($row) {
                return $row->leave_end_date ? $row->leave_end_date : "";
            });

            $table->editColumn('status_color', function ($row) {
                return $row->application_status && LeaveApplication::STATUS_COLOR[$row->application_status] ? LeaveApplication::STATUS_COLOR[$row->application_status] : 'none';
            });
            $table->editColumn('application_status', function ($row) {
                return $row->application_status ? LeaveApplication::APPLICATION_STATUS_SELECT[$row->application_status] : '';
            });

            $table->editColumn('leave_type', function ($row) {
                return $row->leave_type ? LeaveApplication::LEAVE_TYPE_SELECT[$row->leave_type] : '';
            });
            $table->editColumn('hours', function ($row) {
                return $row->hours ? $row->hours : "";
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user->accountDetail->fullname ?? '';
            });

            $table->rawColumns(['actions', 'placeholder', 'leave_category', 'user']);

            return $table->make(true);
        }

        return view('hr::admin.leaveApplications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('leave_application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $users = AccountDetail::all()->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');
        $users = [];
        $activeUsers = User::where('banned', 0)->get();
        foreach ($activeUsers as $key => $value) {
            $users[] = $value->accountDetail()->pluck('fullname', 'user_id');
        }
        $leave_categories = LeaveCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.leaveApplications.create', compact('users', 'leave_categories'));
    }

    public function store(StoreLeaveApplicationRequest $request)
    {
        ///////////////////////////////
        // Check if end date leave smaller than start date leave Show Error Msg
        ///////////////////////////////
        $leaveApplication = new LeaveApplication();
        if ($request->leave_type == 'single_day') {
            $leaveApplication->leave_end_date = $request->leave_start_date;
        }
        if ($request->leave_type == 'multi_days') {
            $this->validate($request, ['leave_end_date' => 'required'], ['leave_end_date.required' => trans('cruds.leaveApplication.fields.required_end_date')]);
        }
        if ($request->leave_type == 'hours') {
            $this->validate($request, ['hours' => 'required']);
        }
        $leaveApplication = LeaveApplication::create($request->all());

        if ($request->input('attachments', false)) {
            $leaveApplication->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');

            // try {
            //     $leaveApplication->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
            // } catch (\Throwable $th) {
            //     dd(str_replace('Spatie\MediaLibrary\\', '', get_class($th)));
            // }
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $leaveApplication->id]);
        }

        /* !!!: Leave Notification */
        $leave_category = LeaveCategory::where('id', $leaveApplication->leave_category_id)->first()->name;
        /* !!!: Leave Mail */
        Mail::to('marwa120640@gmail.com')->cc("marwa120640@gmail.com")
                ->send(new LeaveRequest($leaveApplication, $leaveApplication->user_id, $leave_category));

        $notifyUsers = globalNotificationId($request->user_id);

        $notification = Notification::create([
            'title'   => $leave_category,
            'content' => User::find($request->user_id)->accountDetail()->first()->fullname . ' wants to apply for leave.',
            'model_id' => $leaveApplication->id,
            'model_type' => 'Modules\HR\Entities\LeaveApplication',
            'show_path' => 'admin/hr/leave-applications',
        ]);

        $notification->users()->attach($notifyUsers);

        event(new NewNotification($notification));
        /* !!!: End Leave Notification */

        // Sending Emails for each User admin and Depart. Head

        // dd(new LeaveRequest($leaveApplication));
        // $department_head_employee = AccountDetail::find($leaveApplication->user_id)->designation->department()->first()->email;
        // $board_members = Department::where('department_name', 'Board Members')->orWhere('department_name', 'CEO')->select('email')->get();

        // foreach (['marwa120640@gmail.com'] as $recipient) {
        //     Mail::to($recipient)->cc("marwa120640@gmail.com")
        //         ->send(new LeaveRequest($leaveApplication));
        // }
        return redirect()->route('hr.admin.leave-applications.index');
    }

    public function edit(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $users = User::where('banned', 0)->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $users = AccountDetail::where('employment_id', '!=', null)->get()->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');

        $leave_categories = LeaveCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $leaveApplication->load('user', 'leave_category');

        return view('hr::admin.leaveApplications.edit', compact('users', 'leave_categories', 'leaveApplication'));
    }

    public function update(UpdateLeaveApplicationRequest $request, LeaveApplication $leaveApplication)
    {
        $leaveApplication->update($request->all());

        if ($request->input('attachments', false)) {
            if (!$leaveApplication->attachments || $request->input('attachments') !== $leaveApplication->attachments->file_name) {
                if ($leaveApplication->attachments) {
                    $leaveApplication->attachments->delete();
                }
                $leaveApplication->addMedia(storage_path('tmp\uploads\\' . $request->input('attachments')))->toMediaCollection('attachments');
            }
        } elseif ($leaveApplication->attachments) {
            $leaveApplication->attachments->delete();
        }


        $leave_category = LeaveCategory::where('id', $leaveApplication->leave_category_id)->select('name')->first()->name;

        $notifyUsers = globalNotificationId($request->user_id);

        $notification = Notification::create([
            'title'   => $leave_category,
            'content' => User::find($request->user_id)->accountDetail()->first()->fullname . ' wants to apply for leave.',
            'model_id' => $leaveApplication->id,
            'model_type' => 'Modules\HR\Entities\LeaveApplication',
            'show_path' => 'admin/hr/leave-applications',
        ]);

        $notification->users()->attach($notifyUsers);
        $notification['user_id'] = $request->user_id;
        event(new NewNotification($notification));

        return redirect()->route('hr.admin.leave-applications.index');
    }

    public function show(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $array = explode('.', $leaveApplication->attachments->getUrl());
        // $extension = strtolower(end($array));
        // dd($extension);
        $attachment = $leaveApplication->attachments ? str_replace('storage', 'storage/app/public', $leaveApplication->attachments->getUrl()) : '';

        /* !!!: Update is_read Notification */
        $userNotification = auth()->user()->notifications()->where('notifications.model_id', $leaveApplication->id)->first();
        if ($userNotification) {
            $userNotification->pivot->is_read = 1;
            $userNotification->pivot->save();
        }
        /* !!!: End Update is_read Notification */

        // $v = str_replace(env('APP_URL').'/storage', env('APP_URL').'/storage/app/public', $leaveApplication->attachments->getUrl());
        $leaveApplication->load('user', 'leave_category');

        return view('hr::admin.leaveApplications.show', compact('leaveApplication', 'attachment'));
    }

    public function destroy(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($leaveApplication->trashed()) {
            $leaveApplication->forceDelete();
        } else {
            $leaveApplication->delete();
        }

        // $leaveApplication->delete();

        return back();
    }

    public function forceDelete(Request $request)
    {
        abort_if(Gate::denies('leave_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($request->all());
        $id = $request->id;
        $action = $request->action;

        if ($action == 'delete') {
            LeaveApplication::destroy($id);
        } else if ($action == 'force_delete') {
            LeaveApplication::onlyTrashed()->where('id', $id)->forceDelete();
        } else if ($action == 'restore') {
            LeaveApplication::onlyTrashed()->where('id', $id)->restore();
        }

        return back();
    }

    public function massDestroy(MassDestroyLeaveApplicationRequest $request)
    {
        if (LeaveApplication::whereIn('id', request('ids'))->onlyTrashed()) {
            LeaveApplication::whereIn('id', request('ids'))->forceDelete();
        } else {
            LeaveApplication::whereIn('id', request('ids'))->delete();
        }

        // LeaveApplication::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }



    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('leave_application_create') && Gate::denies('leave_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new LeaveApplication();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
