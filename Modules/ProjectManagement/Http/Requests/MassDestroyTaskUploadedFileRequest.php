<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\TaskUploadedFile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTaskUploadedFileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_uploaded_file_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:task_uploaded_files,id',
        ];
    }
}
