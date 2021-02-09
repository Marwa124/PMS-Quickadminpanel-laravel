<?php
namespace Modules\HR\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
class StoreAccountDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_detail_create');
    }

    public function rules()
    {
        return [
            'user_id'         => [
                'required',
                'integer',
                'exists:users,id'
            ],
            'fullname'        => [
                'string',
                'required',
            ],
            'designation_id'  => [
                'required',
                'integer',
                'exists:designations,id'
            ],
            'set_time_id'     => [
                'integer',
                'required',
                'exists:set_times,id'
            ],  
            'company'         => [
                'string',
                'nullable',
            ],
            'city'            => [
                'string',
                'nullable',
            ],
            'country'         => [
                'string',
                'nullable',
            ],
            'locale'          => [
                'string',
                'nullable',
            ],
            'address'         => [
                'string',
                'nullable',
            ],
            'phone'           => [
                'string',
                'nullable',
            ],
            'mobile'          => [
                'string',
                'nullable',
            ],
            'skype'           => [
                'string',
                'nullable',
            ],
            'language'        => [
                'string',
                'nullable',
            ],
            'joining_date'    => [
                'date_format:' . config('panel.date_format'),
                'date',
                'nullable',
            ],
            'present_address' => [
                'string',
                'nullable',
            ],
            'date_of_birth'   => [
                'date_format:' . config('panel.date_format'),
                'date',
                'nullable',
            ],
            'gender'          => [
                'required',
                'in:male,female'
            ],
            'martial_status'  => [
                'required',
                'in:unmarried,married,divorced,widower,widow'
            ],
            'father_name'     => [
                'string',
                'nullable',
            ],
            'mother_name'     => [
                'string',
                'nullable',
            ],
            'passport'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
