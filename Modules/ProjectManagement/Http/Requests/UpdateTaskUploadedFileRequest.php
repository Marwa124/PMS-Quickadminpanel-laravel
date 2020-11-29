<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\TaskUploadedFile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskUploadedFileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_uploaded_file_edit');
    }

    public function rules()
    {
        return [
            'uploaded_path'      => [
                'string',
                'required',
            ],
            'file_name'          => [
                'string',
                'required',
            ],
            'is_image'           => [
                'required',
            ],
            'image_width'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'image_height'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'task_attachment_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
