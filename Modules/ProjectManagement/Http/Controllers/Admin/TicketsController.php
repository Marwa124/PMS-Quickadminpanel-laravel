<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Notifications\ProjectManagementNotification;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Entities\ticket;
use Modules\ProjectManagement\Entities\TicketReplay;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyTicketRequest;
use Modules\ProjectManagement\Http\Requests\StoreTicketRequest;
use Modules\ProjectManagement\Http\Requests\UpdateTicketRequest;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\Department;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectManagementMail;

class TicketsController extends Controller
{
    use MediaUploadingTrait , ProjectManagementHelperTrait;

    public function index()
    {
        abort_if(Gate::denies('ticket_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        if (request()->segment(count(request()->segments())) == 'trashed'){

            abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

            $trashed = true;
            //$tickets = Ticket::onlyTrashed()->get();
            $tickets = auth()->user()->getUserTicketsByUserID(auth()->user()->id,$trashed);

            return view('projectmanagement::admin.tickets.index', compact('tickets','trashed'));
        }

        $trashed = false;
        $tickets = auth()->user()->getUserTicketsByUserID(auth()->user()->id,$trashed);

        return view('projectmanagement::admin.tickets.index', compact('tickets','trashed'));
    }

    public function create($id = null)
    {
        // $id  refer to project id in case

        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('name_'.app()->getLocale(), 'id');
        $project = null;

        if (request()->segment(count(request()->segments())-1) == 'project-ticket')
        {
            $project = Project::findOrFail($id);

            // check if user can access this project or not
            $all_projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

            if (!in_array($project->id,$all_projects->toArray())){

                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }
        }

        return view('projectmanagement::admin.tickets.create', compact('projects','project'));
    }

    public function store(StoreTicketRequest $request)
    {
        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $request['reporter'] = auth()->user()->id;
        $request['ticket_code'] = 'tick'.substr(time(),-7);           //pms + time function to be sure this num is unique

        $ticket = Ticket::create($request->all());

        if ($request->input('file', false)) {
            $ticket->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ticket->id]);
        }

        return redirect()->route('projectmanagement.admin.tickets.index');
    }

    public function edit(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $tickets = auth()->user()->getUserTicketsByUserID(auth()->user()->id)->pluck('id');
        if (in_array($ticket->id,$tickets->toArray()))
        {

            $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('name_'.app()->getLocale(), 'id');


            $ticket->load('project', 'department');

            return view('projectmanagement::admin.tickets.edit', compact('projects', 'ticket'));
        }

        abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();
            $ticket->update($request->all());
            //$ticket->permissions()->sync($request->input('permissions', []));

            if ($request->input('file', false)) {
                if (!$ticket->file || $request->input('file') !== $ticket->file->file_name) {
                    if ($ticket->file) {
                        $ticket->file->delete();
                    }

                    $ticket->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
                }
            } elseif ($ticket->file) {
                $ticket->file->delete();
            }

            // Notify User
            foreach ($ticket->accountDetails as $accountUser)
            {
                $user = $accountUser->user;
    //            $dataMail = [
    //                'subjectMail'    => 'Update Ticket : '.$ticket->ticket_code,
    //                'bodyMail'       => 'Update The Ticket : '.$ticket->ticket_code,
    //                'action'         => route("projectmanagement.admin.tickets.show", $ticket->id)
    //            ];

                $dataNotification = [
                    'message'       => 'Update The Ticket : '.$ticket->ticket_code,
                    'route_path'    => 'admin/projectmanagement/tickets',
                ];

    //            $user->notify(new ProjectManagementNotification($ticket,$user,$dataMail,$dataNotification));

                //send notification
                $user->notify(new ProjectManagementNotification($ticket,$user,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));

                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;
                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender));
            }

            DB::commit();

            return redirect()->route('projectmanagement.admin.tickets.index')->with(flash(trans('cruds.messages.update_success'), 'success'));


        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.update_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }
//        return redirect()->route('projectmanagement.admin.tickets.index');
    }

    public function show(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $tickets = auth()->user()->getUserTicketsByUserID(auth()->user()->id)->pluck('id');
        if (in_array($ticket->id,$tickets->toArray()))
        {

            $ticket->load('project', 'department');

            return view('projectmanagement::admin.tickets.show', compact('ticket'));
        }

        abort(Response::HTTP_FORBIDDEN,  trans('global.forbidden_page_not_allow_to_you'));

    }

    public function destroy(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $ticket->delete();

        return back();
    }

    public function massDestroy(MassDestroyTicketRequest $request)
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        Ticket::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ticket_create') && Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $model         = new Ticket();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getAssignTo($id){

        abort_if(Gate::denies('ticket_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $ticket = Ticket::findOrFail($id);

        if (!$ticket->project){

            abort(404,trans('cruds.messages.ticket_not_have_project'));
        }

        $department = $ticket->project->department;

        if (!$department){
            abort(404,trans('cruds.messages.project_of_ticket_not_have_department'));

        }

        return view('projectmanagement::admin.tickets.assignto',compact('ticket','department'));
    }


    public function storeAssignTo(Request $request)
    {
        abort_if(Gate::denies('ticket_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();
            $ticket = Ticket::findOrFail($request->ticket_id);
            if ($request->accounts){


                $ticket->accountDetails()->sync($request->accounts);
                // set permission to users
                $accounts = AccountDetail::whereIn('id',$request->accounts)->with('user.department')->get();

                $ticket_permissions_head_names = ['project_management_access','ticket_access','ticket_create', 'ticket_show','ticket_edit','ticket_assign_to'];
                $ticket_permissions_notToMember_names = ['ticket_create','ticket_assign_to'];
    //            $ticket_permissions_head_names = ['project_management_access','ticket_access','ticket_create', 'ticket_show','ticket_edit'];
    //            $ticket_permissions_notToMember_names = ['ticket_create'];
                $ticket_permissions_toMember_names = ['project_management_access','ticket_access','ticket_show','ticket_edit'];

                $ticket_permissions_head = $this->getPermissionID($ticket_permissions_head_names);
                $ticket_permissions_notToMember = $this->getPermissionID($ticket_permissions_notToMember_names);
                $ticket_permissions_toMember = $this->getPermissionID($ticket_permissions_toMember_names);

                foreach ($accounts as $account){

                    foreach ($account->user->permissions as $permission){

                        if (in_array($permission->name,$ticket_permissions_notToMember_names)){
                            $account->user->permissions()->detach($ticket_permissions_notToMember);
                        }
                    }
                    $account->user->permissions()->syncWithoutDetaching($ticket_permissions_toMember);

                    foreach ($account->user->department as $department){
                        if ($department->department_name == $ticket->project->department->department_name){
                            $account->user->permissions()->syncWithoutDetaching($ticket_permissions_head);

                            break;
                        }
                    }
                }
            }else{
                $ticket->accountDetails()->detach();
            }

            // Notify User
            foreach ($ticket->accountDetails as $accountUser)
            {
                $user = $accountUser->user;
//                $dataMail = [
//                    'subjectMail'    => 'New Ticket Assign To You',
//                    'bodyMail'       => 'Assign The Ticket : '.$ticket->ticket_code.' To '.$user->name,
//                    'action'         => route("projectmanagement.admin.tickets.show", $ticket->id)
//                ];

                $dataNotification = [
                    'message'       => 'Assign The Ticket : '.$ticket->ticket_code.' To '.$user->name,
                    'route_path'    => 'admin/projectmanagement/tickets',
                ];

//                $user->notify(new ProjectManagementNotification($ticket,$user,$dataMail,$dataNotification));

                //send notification
                $user->notify(new ProjectManagementNotification($ticket,$user,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));

                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;
                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender));
            }
            // Commit the transaction
            DB::commit();

            return redirect()->route('projectmanagement.admin.tickets.index')->with(flash(trans('cruds.messages.assignto_success'), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return back()->with(flash(trans('cruds.messages.assignto_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('projectmanagement.admin.tickets.index');
    }

    public function replay(Request $request)
    {

        if ($request->ticket_replay_id){

            $validator = $request->validate([
                'replay_body' => 'required',
            ]);
//            if ($validator->fails()) {
//                return redirect()->back()->withErrors($validator)->withInput();
//            }


            $replay = TicketReplay::create([
                'ticket_id'         => $request->ticket_id,
                'body'              => $request->replay_body,
                'replier_id'        => auth()->user()->id,
                'ticket_replay_id'  => $request->ticket_replay_id,
            ]);
        }else{

            $validator = $request->validate([
                'body' => 'required',
            ]);

//            if ($validator->fails()) {
//                return redirect()->back()->withErrors($validator)->withInput();
//            }

            $replay = TicketReplay::create([
                'ticket_id'         => $request->ticket_id,
                'body'              => $request->body,
                'replier_id'        => auth()->user()->id,

            ]);

        }

        //save attachment
        return redirect()->back();
    }

    public function change_status(Request $request)
    {
        abort_if(Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        //dd($request->all());

        try {
            // Begin a transaction
            DB::beginTransaction();

            $ticket = Ticket::findOrFaiL($request->ticket_id);

            $ticket->update($request->all());

            // Notify User
            foreach ($ticket->accountDetails as $accountUser)
            {
                $user = $accountUser->user;
//                $dataMail = [
//                    'subjectMail'    => 'Update Ticket : '.$ticket->ticket_code ,
//                    'bodyMail'       => 'Update The Ticket : '.$ticket->ticket_code .' status to '.$ticket->status,
//                    'action'         => route("projectmanagement.admin.tickets.show", $ticket->id)
//                ];

                $dataNotification = [
                    'message'       => 'Update Ticket : '.$ticket->ticket_code .' status to '.$ticket->status,
                    'route_path'    => 'admin/projectmanagement/tickets',
                ];

//                $user->notify(new ProjectManagementNotification($ticket,$user,$dataMail,$dataNotification));

                //send notification
                $user->notify(new ProjectManagementNotification($ticket,$user,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));

                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;
                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender));
            }

            // Commit the transaction
            DB::commit();

            return back()->with(flash(trans('cruds.messages.update_note_success'), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return back()->with(flash(trans('cruds.messages.update_note_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }

//        return redirect()->back();

    }

    public function forceDelete(Request $request,$id)
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        //dd($request->all(),$id);
        $action = $request->action;

        if ($action == 'force_delete') {

            $ticket = Ticket::onlyTrashed()->where('id', $id)->first();
            //force Delete Task
            $this->forceDeleteTicket($ticket);

        } else if ($action == 'restore') {
            //restore Task
            Ticket::onlyTrashed()->where('id', $id)->restore();
        }

        return back();

    }

    public function ticket_report()
    {
        abort_if(Gate::denies('ticket_report_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $tickets = Ticket::all();

        $yearly_report = $this->get_project_report_by_month(true);

        $openedArray = [];
        $answeredArray = [];
        $in_progressArray = [];
        $closedArray = [];
        $reopenArray = [];

        foreach($yearly_report as $report)
        {
            array_push($openedArray,$report->where('status','opened')->count());
            array_push($answeredArray,$report->where('status','answered')->count());
            array_push($in_progressArray,$report->where('status','in_progress')->count());
            array_push($closedArray,$report->where('status','closed')->count());
            array_push($reopenArray,$report->where('status','reopen')->count());
        }


        $openedArray = implode(',',$openedArray);
        $answeredArray = implode(',',$answeredArray);
        $in_progressArray = implode(',',$in_progressArray);
        $closedArray = implode(',',$closedArray);
        $reopenArray = implode(',',$reopenArray);

        return view('projectmanagement::admin.tickets.ticket_report', compact('tickets','openedArray','answeredArray','in_progressArray','closedArray','reopenArray'));

    }
}
