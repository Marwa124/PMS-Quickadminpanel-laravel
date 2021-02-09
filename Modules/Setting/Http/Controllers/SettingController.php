<?php

namespace Modules\Setting\Http\Controllers;

use Gate;
use App\Models\Config;
use App\Models\Locale;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;
use Modules\MaterialsSuppliers\Entities\TaxRate;

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
        $taxes = TaxRate::orderBy('rate_percent', 'ASC')->get();
        $date_format = settings('date_format');
        $default_tax = [];

        $decimal_separator = settings('decimal_separator', 2);

        $decimal = sprintf('%0' . $decimal_separator . 'd', 0);
        if (settings('default_tax')) {
            $default_tax = !is_numeric(settings('default_tax')) ? unserialize(settings('default_tax')) : settings('default_tax');
        }



        return view(
            'setting::company_details.index',
            compact(
                'countries',
                'currencies',
                'languages',
                'locales',
                'timezones',
                'taxes',
                'default_tax',
                'date_format',
                'decimal_separator',
                'decimal'

            )
        );
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

    public function save_system(Request $request)
    {

        $timezones  = timezones();


        if (!array_key_exists(request('timezone'), $timezones)) {

            return back()->withInput()->with(flash(trans('settings.timezone_invalid'), 'danger'));
        }



        $validator = Validator::make($request->all(), [

            'default_language' => 'required|exists:languages,id|string',
            'locale' => 'required|exists:locales,locale|string',
            'timezone' => 'required|string',
            'default_currency' => 'required|exists:currencies,code|string',
            'currency_position' => 'required|string|in:left,right',
            'default_tax' => '2',
            'tables_pagination_limit' => '50',
            'date_format' => null,
            'time_format' => null,
            'money_format' => null,
            'decimal_separator' => '2',
            'allowed_files' => null,
            'max_file_size' => null,
            'google_api_key' => 'key',
            'recaptcha_site_key' => 'site',
            'recaptcha_secret_key' => 'key',
            'auto_close_ticket' => '30',
            'enable_languages' => 'true',
            'allow_sub_tasks' => 'true',
            'only_allowed_ip_can_clock' => 'true',
            'allow_client_registration' => 'true',
            'allow_apply_job_from_login' => 'true',
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


        dd($request->all());
    }
}
