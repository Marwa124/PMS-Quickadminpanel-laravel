<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOutgoingEmailRequest;
use App\Http\Requests\StoreOutgoingEmailRequest;
use App\Http\Requests\UpdateOutgoingEmailRequest;
use App\Models\OutgoingEmail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class OutgoingEmailsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('outgoing_email_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outgoingEmails = OutgoingEmail::all();

        return view('admin.outgoingEmails.index', compact('outgoingEmails'));
    }

    public function create()
    {
        abort_if(Gate::denies('outgoing_email_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outgoingEmails.create');
    }

    public function store(StoreOutgoingEmailRequest $request)
    {
        $outgoingEmail = OutgoingEmail::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $outgoingEmail->id]);
        }

        return redirect()->route('admin.outgoing-emails.index');
    }

    public function edit(OutgoingEmail $outgoingEmail)
    {
        abort_if(Gate::denies('outgoing_email_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outgoingEmails.edit', compact('outgoingEmail'));
    }

    public function update(UpdateOutgoingEmailRequest $request, OutgoingEmail $outgoingEmail)
    {
        $outgoingEmail->update($request->all());

        return redirect()->route('admin.outgoing-emails.index');
    }

    public function show(OutgoingEmail $outgoingEmail)
    {
        abort_if(Gate::denies('outgoing_email_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outgoingEmails.show', compact('outgoingEmail'));
    }

    public function destroy(OutgoingEmail $outgoingEmail)
    {
        abort_if(Gate::denies('outgoing_email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outgoingEmail->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutgoingEmailRequest $request)
    {
        OutgoingEmail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('outgoing_email_create') && Gate::denies('outgoing_email_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new OutgoingEmail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
