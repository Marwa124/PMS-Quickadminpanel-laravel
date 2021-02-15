<?php

namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\ProjectManagement\Entities\Comment;
use Modules\Sales\Http\Requests\Destroy\MassDestroyOpportunityRequest;
use Modules\Sales\Http\Requests\Store\StoreOpportunityRequest;
use Modules\ProjectManagement\Http\Requests\StoreTaskAttachmentRequest;
use Modules\Sales\Http\Requests\Update\UpdateOpportunityRequest;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Result;
use Modules\Sales\Entities\Call;
use Modules\Sales\Entities\Meeting;
use Modules\Sales\Entities\Opportunity;
use Spatie\Permission\Models\Permission;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Entities\TaskAttachment;
use App\Models\PermissionGroup;
use Modules\Sales\Entities\Client;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use DB;
use Illuminate\Support\Facades\Validator;
use Modules\Sales\Http\Requests\Store\StoreMeetingRequest;
use App\Models\User;
class OpportunitiesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('opportunity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opportunities = Opportunity::all();

        $leads = Lead::get();
        
        return view('sales::admin.opportunities.index', compact('opportunities', 'leads'));
    }

    public function create()
    {
        abort_if(Gate::denies('opportunity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
 
        $permissions =PermissionGroup::with('permissions')->where('name','opportunity')->first();

        return view('sales::admin.opportunities.create', compact('leads', 'permissions'));
    }

    public function store(StoreOpportunityRequest $request)
    {
       
        $opportunity = Opportunity::create($request->all());
        // $opportunity->permissions()->sync($request->input('permissions', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $opportunity->id]);
        }

        return redirect()->route('sales.admin.opportunities.index');
    }

    public function edit(Opportunity $opportunity)
    {
        abort_if(Gate::denies('opportunity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions =PermissionGroup::with('permissions')->where('name','opportunity')->first();

        return view('sales::admin.opportunities.edit', compact('permissions', 'opportunity'));
    }

    public function update(UpdateOpportunityRequest $request, Opportunity $opportunity)
    {
        $opportunity->update($request->all());
        // $opportunity->permissions()->sync($request->input('permissions', []));

        return redirect()->route('sales.admin.opportunities.index');
    }

    public function show(Opportunity $opportunity)
    {
        abort_if(Gate::denies('opportunity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients=Client::all()->pluck('name', 'id');
        $results=Result::all()->pluck('name', 'id');
        $opportunities=Opportunity::all();
        $users = AccountDetail::where('employment_id', '!=', null)->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('sales::admin.opportunities.show', compact('opportunity','clients','results','users','opportunities'));
    }

    public function destroy(Opportunity $opportunity)
    {
        abort_if(Gate::denies('opportunity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opportunity->delete();

        return back();
    }

    public function massDestroy(MassDestroyOpportunityRequest $request)
    {
        Opportunity::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('opportunity_create') && Gate::denies('opportunity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Opportunity();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function createcalls(Request $request)
    {
        DB::beginTransaction();
       
       try {
             $validator = Validator::make($request->all(), [
                'opportunities_id'           => 'exists:opportunities,id',
                'call_by'     => 'sometimes|string',
                'note'         => 'sometimes|string',
                'result_id'        => 'exists:results,id',
                'client_id'        => 'exists:clients,id',
                'date'           => 'sometimes',
                'next_action'       => 'sometimes',
                'next_action_date'          => 'sometimes',
                'qualification'          => 'sometimes',

            ], [
                // 'opportunities_id.required'                  => trans('settings.company_name_required'),
                // 'call_by.string'                    => trans('settings.company_name_string'),
                // 'note.required'            => trans('settings.company_legal_name_required'),
                // 'result_id.string'              => trans('settings.company_legal_name_string'),
                // 'client_id.required'                => trans('settings.contact_person_required'),
                // 'date.string'                  => trans('settings.contact_person_string'),
                // 'next_action.required'               => trans('settings.company_address_required'),
                // 'next_action_date.string'                 => trans('settings.company_address_string'),
                // 'qualification.required'               => trans('settings.company_country_required'),
                // 'company_country.exists'                 => trans('settings.company_country_exists'),
            ]);
            if ($validator->fails()) {

                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
            }

            Call::create($request->all());
            DB::commit();
            return redirect()->back()->with(flash('calls add successfully', 'success'));


        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something wrong happen','alert-type' => 'error']);
        }
    }


   public function storemeeting(StoreMeetingRequest $request)
    {
      
         DB::beginTransaction();
         try{
            $meetingMinute = Meeting::create($request->all());

            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $meetingMinute->id]);
            }

 
        DB::commit();
        return redirect()->back()->with(flash('Meeting add successfully', 'success'));


        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something wrong happen','alert-type' => 'error']);
        }
     
    }


    public function destroymeeting(Meeting $meeting)
    { 
        // dd($meeting);
        try{
            // abort_if(Gate::denies('meeting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $meeting->delete();
            return back()->with(flash('Meeting add successfully', 'success'));
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with(['message' => 'Something wrong happen','alert-type' => 'error']);
        }
    }


    public function storeattachment(StoreTaskAttachmentRequest $request,Opportunity $opportunity)
    {
         DB::beginTransaction();
         try{
            $taskAttachment = TaskAttachment::create($request->all());
            if ($request->input('attachments', false)) {
                foreach ($request->attachments as $attachment) {
                    $taskAttachment->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
                }
            }
            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $taskAttachment->id]);
            }

            DB::commit();
            return redirect()->back()->with(flash('Attachment add successfully', 'success'));


        } catch (\Exception $e) {
            
            return redirect()->back()->with(['message' => 'Something wrong happen','alert-type' => 'error']);
        }
    }

    // attachment opperation
    public function downloadMedia($id)
    {
        $media = Media::findOrFail($id);
        return response()->download($media->getPath(), $media->file_name);
    }

    public function viewMedia($id)
    {
        $media = Media::findOrFail($id);
        return response()->file($media->getPath());
    }

    public function deleteMedia($id,TaskAttachment $taskAttachment)
    { 
        DB::beginTransaction();
         try{
            if($taskAttachment->hasMedia('attachments') == true){
                $taskAttachment->clearMediaCollection('attachments');
            }
            $taskAttachment->delete(); 
            DB::commit();
            return redirect()->back()->with(flash('Attachment Deleted successfully', 'success'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something wrong happen','alert-type' => 'error']);
        }

    }

    public function add_comment(Request $request)
    {

        try {
            // Begin a transaction
            DB::beginTransaction();

//            $opportunity = Opportunity::findOrFail($request->opportunity_id);
            if ($request->comment_replay_id){

                $validator = Validator::make($request->all(),[
                    'opportunity_id'        => 'exists:opportunities,id',
                    'replay_comment'    => 'required',
                    'comment_replay_id'  => 'exists:comments,id',
                ]);
                if($validator->fails()) {
                    return redirect()->back()->with(flash(trans('cruds.messages.add_replay_failed'), 'danger'))->withErrors($validator)->withInput();
                }
                $comment = Comment::create([
                    'module_field_id'       => $request->opportunity_id,
                    'comment'               => $request->replay_comment,
                    'module'                => 'opportunity',
                    'user_id'               => auth()->user()->id,
                    'comment_replay_id'     => $request->comment_replay_id,
                ]);

//                setActivity('opportunity',$opportunity->id,'add replay on comment ','تم إضافة رد على تعليق',$opportunity->name,$opportunity->name);
                $flashMsg = flash(trans('cruds.messages.add_replay_success'), 'success');

            }else{

                $validator = Validator::make( $request->all(),[
                    'opportunity_id'    => 'exists:opportunities,id',
                    'comment'           => 'required',
                ]);

                if($validator->fails()) {
                    return redirect()->back()->with(flash(trans('cruds.messages.add_replay_failed'), 'danger'))->withErrors($validator)->withInput();
                }

                $comment = Comment::create([
                    'module_field_id'       => $request->opportunity_id,
                    'comment'               => $request->comment,
                    'module'                => 'opportunity',
                    'user_id'               => auth()->user()->id,
                ]);

//                setActivity('opportunity',$opportunity->id,'add comment ','تم إضافة تعليق',$opportunity->name,$opportunity->name);
                $flashMsg = flash(trans('cruds.messages.add_comment_success'), 'success');
            }


            // Commit the transaction
            DB::commit();
            return back()->with($flashMsg);

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            return back()->with(flash(trans('cruds.messages.add_comment_failed'), 'danger'))->withInput();

            // and throw the error again.
            throw $e;
        }
//        return redirect()->back();
    }

}
