<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreKbCategoryRequest;
use App\Http\Resources\Admin\KbCategoryResource;
use App\Models\KbCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KbCategoriesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('kb_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KbCategoryResource(KbCategory::all());
    }

    public function store(StoreKbCategoryRequest $request)
    {
        $kbCategory = KbCategory::create($request->all());

        return (new KbCategoryResource($kbCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(KbCategory $kbCategory)
    {
        abort_if(Gate::denies('kb_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kbCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
