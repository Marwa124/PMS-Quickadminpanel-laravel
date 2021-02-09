<?php

namespace Modules\Setting\Http\Controllers;

use Gate;
use App\Models\Config;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function company_details()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $countries  = Country::all();
        $currencies = Currency::all();
        $languages  = Language::all();
        $locales    = Locale::all();
        $timezones  = timezones();

        // dd($locales);



        return view('setting::company_details.index', compact('countries', 'currencies', 'languages', 'locales', 'timezones'));
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

                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
            }

            // unset($validator->getData()['_token']);

            $validated_inputs =  array_diff_key($validator->getData(), array_flip(["_token"]));

            foreach ($validated_inputs as $key => $value) {

                Config::updateorCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }


            return back()->with(flash(trans('settings.company_details_updated'), 'success'));
        } catch (\Exception $e) {

            return back()->withInput()->with(flash(' Something Went Wrong', 'danger'));
        }
    }


    public function save_currency(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'code'                  => 'required|string|unique:code',
            'name'                  => 'required|string|unique:name',
            'symbol'                => 'required|string|unique:symbol',

        ], [
            'code.required'                                => trans('settings.code_required'),
            'code.string'                                  => trans('settings.code_string'),

            'name.required'                                => trans('settings.name_required'),
            'name.string'                                  => trans('settings.name_string'),

            'symbol.required'                              => trans('settings.symbol_required'),
            'symbol.string'                                => trans('settings.symbol_string'),
        ]);



        if ($validator->fails()) {

            return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
        }



        Currency::create([
            'code'   => request('code'),
            'name'   => request('name'),
            'symbol' => request('symbol'),
        ]);

        return back()->with(flash(trans('settings.currency_created'), 'success'))->with('pill', 'company-system');
    }

    public function update_currency(Request $request)
    {


        $currency = Currency::findOrFail($request->id);

        $validator = Validator::make($request->all(), [
            'code'                  => 'required|string',
            'name'                  => 'required|string|unique:currencies,name,' . $request->id,
            'symbol'                => 'required|string',

        ], [
            'code.required'                                => trans('settings.code_required'),
            'code.string'                                  => trans('settings.code_string'),

            'name.required'                                => trans('settings.name_required'),
            'name.string'                                  => trans('settings.name_string'),

            'symbol.required'                              => trans('settings.symbol_required'),
            'symbol.string'                                => trans('settings.symbol_string'),
        ]);


        if ($validator->fails()) {

            return response()->json(['message' => $validator->errors()->all()[0]], 400);
        }



        $currency->update([

            'code' => $request->code,
            'name' => $request->name,
            'symbol' => $request->symbol
        ]);

        return response()->json(['message' => trans('settings.currency_updated')], 200);
    }


    public function remove_currency(Request $request)
    {
        Currency::findOrFail($request->id)->delete();
        return response()->json(['message' => trans('settings.currency_deleted')], 200);
    }

    public function save_system()
    {


        dd('here');
    }
}