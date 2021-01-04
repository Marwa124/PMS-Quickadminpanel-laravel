<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\ProjectManagement\Entities\Ticket;
use Modules\ProjectManagement\Entities\TicketReplay;
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

class TicketsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tickets = Ticket::all();

        $projects = Project::get();

        $departments = Department::get();

        //$permissions = Permission::get();

        return view('projectmanagement::admin.tickets.index', compact('tickets', 'projects', 'departments'));
    }

    public function create($id = null)
    {
        // $id  refer to project id in case

        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id');
        $project = null;

        if (request()->segment(count(request()->segments())-1) == 'project-ticket')
        {
            $project = Project::findOrFail($id);
        }

        //$departments = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

//        $permissions = Permission::all()->pluck('title', 'id');

        return view('projectmanagement::admin.tickets.create', compact('projects','project'));
    }

    public function store(StoreTicketRequest $request)
    {
        $request['reporter'] = auth()->user()->id;
        $request['ticket_code'] = 'tick'.substr(time(),-7);           //pms + time function to be sure this num is unique

        $ticket = Ticket::create($request->all());
        //$ticket->permissions()->sync($request->input('permissions', []));

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
        abort_if(Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id');

        //$departments = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$permissions = Permission::all()->pluck('title', 'id');

        $ticket->load('project', 'department');

        return view('projectmanagement::admin.tickets.edit', compact('projects', 'ticket'));
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
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

        return redirect()->route('projectmanagement.admin.tickets.index');
    }

    public function show(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket->load('project', 'department');
//        dd($ticket->getFileAttribute());
        return view('projectmanagement::admin.tickets.show', compact('ticket'));
    }

    public function destroy(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket->delete();

        return back();
    }

    public function massDestroy(MassDestroyTicketRequest $request)
    {
        Ticket::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ticket_create') && Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Ticket();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function replay(Request $request)
    {
        //dd($request->all());
        $replay = TicketReplay::create([
            'ticket_id' => $request->ticket_id,
            'body' => $request->body,
            'replier_id' => auth()->user()->id,

        ]);
        //save attachment
        return redirect()->back();
    }

    public function change_status(Request $request)
    {
        //dd($request->all());

        $ticket = Ticket::findOrFaIL($request->ticket_id);

        $ticket->update($request->all());

        return redirect()->back();

    }
}
