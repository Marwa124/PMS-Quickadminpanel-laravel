<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyKbCategoryRequest;
use App\Http\Requests\StoreKbCategoryRequest;
use App\Models\KbCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class KbCategoriesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('kb_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kbCategories = KbCategory::all();

        return view('admin.kbCategories.index', compact('kbCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('kb_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kbCategories.create');
    }

    public function store(StoreKbCategoryRequest $request)
    {
        $kbCategory = KbCategory::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $kbCategory->id]);
        }

        return redirect()->route('admin.kb-categories.index');
    }

    public function destroy(KbCategory $kbCategory)
    {
        abort_if(Gate::denies('kb_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kbCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyKbCategoryRequest $request)
    {
        KbCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('kb_category_create') && Gate::denies('kb_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new KbCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
