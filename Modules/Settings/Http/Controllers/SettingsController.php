<?php

namespace Modules\SETTING\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sales\Entities\Country;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function company_details()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();

        return view('setting::company_details.index', compact('countries'));
    }


    public function save_details(Request $request)
    {



        try {



            $validator = Validator::make($request->all(), [
                'company_name'           => 'required|string',
                'company_legal_name'     => 'required|string',
                'contact_person'         => 'required|string',
                'company_address'        => 'required|string',
                'company_country'        => 'required|string|exists:countries,value',
                'company_city'           => 'required|string',
                'company_zip_code'       => 'required|integer',
                'company_phone'          => 'required|string||regex:/^([0-9\s\-\+\(\)]*)$/|min:5|max:20|',
                'company_email'          => 'required|email|string',
                'company_domain'         => 'sometimes|nullable|string',
                'company_vat'            => 'required|integer'



            ], [
                'company_name.required'                  => trans('settings.company_name_required'),
                'company_name.string'                    => trans('settings.company_name_string'),
                'company_legal_name.required'            => trans('settings.company_legal_name_required'),
                'company_legal_name.string'              => trans('settings.company_legal_name_string'),
                'contact_person.required'                => trans('settings.contact_person_required'),
                'contact_person.string'                  => trans('settings.contact_person_string'),
                'company_address.required'               => trans('settings.company_address_required'),
                'company_address.string'                 => trans('settings.company_address_string'),
                'company_country.required'               => trans('settings.company_country_required'),
                'company_country.string'                 => trans('settings.company_country_string'),


                'company_country.exists'                 => trans('settings.company_country_exists'),


                'company_city.required'                  => trans('settings.company_city_required'),
                'company_city.string'                    => trans('settings.company_city_string'),

                'company_zip_code.required'              => trans('settings.company_zip_code_required'),
                'company_zip_code.string'                => trans('settings.company_zip_code_string'),
                'company_zip_code.integer'                => trans('settings.company_zip_code_integer'),

                'company_phone.required'                 => trans('settings.company_phone_required'),
                'company_phone.string'                   => trans('settings.company_phone_string'),


                'company_email.required'                => trans('settings.company_email_required'),
                'company_email.string'                  => trans('settings.company_email_string'),
                'company_email.email'                   => trans('settings.company_email_email'),


                'company_domain.string'                  => trans('settings.company_domain_string'),

                'company_vat.required'                   => trans('settings.company_vat_required'),
                'company_vat.integer'                    => trans('settings.company_vat_integer'),



            ]);




            if ($validator->fails()) {

                $notification = array(
                    'message' => $validator->errors()->all()[0],
                    'alert-type' => 'danger'
                );

                return back()->withInput()->with($notification);
            }

            // unset($validator->getData()['_token']);

            $validated_inputs =  array_diff_key($validator->getData(), array_flip(["_token"]));

            foreach ($validated_inputs as $key => $value) {

                Config::updateorCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }


            $notification = array(
                'message' => trans('settings.company_details_updated'),
                'alert-type' => 'success'
            );

            return back()->with($notification);
        } catch (\Exception $e) {

            $notification = array(
                'message'    =>  ' Something Went Wrong',
                'alert-type' =>  'danger'
            );

            return back()->withInput()->with($notification);
        }
    }
}