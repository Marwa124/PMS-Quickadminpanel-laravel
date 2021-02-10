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

        $default_tax = [];

        $decimal = sprintf('%0' . settings('decimal_separator', 2) . 'd', 0);
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
            'code'                  => 'required|string',
            'name'                  => 'required|string|unique:currencies,name',
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

        $date_formats = [
            '%d-%m-%Y',
            '%m-%d-%Y',
            '%Y-%m-%d',
            '%d-%m-%y',
            '%m-%d-%y',
            '%m.%d.%Y',
            '%d.%m.%Y',
            '%Y.%m.%d',

        ];

        $time_formats = [
            'g:i a',
            'g:i A',
            'H:i'
        ];
        if (request('time_format')) {

            if (!in_array(request('time_format'), $time_formats)) {

                return back()->withInput()->with(flash(trans('settings.timeformat_invalid'), 'danger'))->with('pill', 'company-system');
            }
        }

        if (request('date_format')) {

            if (!in_array(request('date_format'), $date_formats)) {

                return back()->withInput()->with(flash(trans('settings.dateformat_invalid'), 'danger'))->with('pill', 'company-system');
            }
        }

        $timezones  = timezones();
        if (request('timezone')) {


            if (!array_key_exists(request('timezone'), $timezones)) {

                return back()->withInput()->with(flash(trans('settings.timezone_invalid'), 'danger'))->with('pill', 'company-system');
            }
        }


        $validator = Validator::make($request->all(), [

            'default_language' => 'sometimes|nullable|exists:languages,name|string',
            'locale' => 'sometimes|nullable|exists:locales,locale|string',
            'timezone' => 'sometimes|nullable|string',
            'default_currency' => 'sometimes|nullable|exists:currencies,code|string',


            'currency_position' => 'sometimes|nullable|string|in:left,right',

            'default_tax' => 'sometimes|nullable|array|exists:tax_rates,id',
            'tables_pagination_limit' => 'sometimes|nullable|integer',
            'date_format' => 'sometimes|nullable|string',
            'time_format' => 'sometimes|nullable|string',
            'money_format' => 'sometimes|nullable|integer|min:1|max:8',
            'decimal_separator' => 'sometimes|nullable|integer',
            'allowed_files' => 'sometimes|nullable|string',
            'max_file_size' => 'sometimes|nullable|integer',
            'google_api_key' => 'sometimes|nullable|string',
            'recaptcha_site_key' => 'sometimes|nullable|string',
            'recaptcha_secret_key' => 'sometimes|nullable|string',
            'auto_close_ticket' => 'sometimes|nullable|integer',
            'enable_languages' => 'sometimes|nullable|string',
            'allow_sub_tasks' => 'sometimes|nullable|string',
            'only_allowed_ip_can_clock' => 'sometimes|nullable|string',
            'allow_client_registration' => 'sometimes|nullable|string',
            'allow_apply_job_from_login' => 'sometimes|nullable|string',
        ], [
            'default_language_string' => trans('settings.default_language_string'),
            'locale_string' => trans('settings.locale_string'),
            'timezone_string' => trans('settings.timezone_string'),


            'currency_position_string' => trans('settings.currency_position_string'),

            'default_tax_integer' => trans('settings.default_tax_integer'),

            'tables_pagination_limit_integer' => trans('settings.tables_pagination_limit_integer'),
            'date_format_string' => trans('settings.date_format_string'),
            'time_format_string' => trans('settings.time_format_string'),

            'money_format_integer' => trans('settings.money_format_integer'),
            'money_format_min' => trans('settings.money_format_min'),
            'money_format_max' => trans('settings.money_format_max'),

            'decimal_separator_integer' => trans('settings.decimal_separator_integer'),

            'allowed_files_string' => trans('settings.allowed_files_string'),

            'max_file_size_integer' => trans('settings.max_file_size_integer'),

            'google_api_key_string' => trans('settings.google_api_key_string'),
            'recaptcha_site_key_string' => trans('settings.recaptcha_site_key_string'),


            'recaptcha_secret_key_string' => trans('settings.recaptcha_secret_key_string'),

            'auto_close_ticket_integer' => trans('settings.auto_close_ticket_integer'),
            'enable_languages_string' => trans('settings.enable_languages_string'),
            'allow_sub_tasks_string' => trans('settings.allow_sub_tasks_string'),

            'only_allowed_ip_can_clock_string' => trans('settings.only_allowed_ip_can_clock_string'),
            'allow_client_registration_string' => trans('settings.allow_client_registration_string'),
            'allow_apply_job_from_login_string' => trans('settings.allow_apply_job_from_login_string'),
        ]);


        if ($validator->fails()) {

            return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'company-system');
        }




        $validated_inputs =  array_diff_key($validator->getData(), array_flip(["_token"]));

        foreach ($validated_inputs as $key => $value) {

            Config::updateorCreate(
                ['key' => $key],
                ['value' => is_array($value) ? serialize($value) : $value]
            );
        }

        if (request('date_format')) {

            switch (request('date_format')) {

                case "%d-%m-%Y":
                    $picker = "dd-mm-yyyy";
                    $phptime = "d-m-Y";
                    break;
                case "%m-%d-%Y":
                    $picker = "mm-dd-yyyy";
                    $phptime = "m-d-Y";
                    break;
                case "%Y-%m-%d":
                    $picker = "yyyy-mm-dd";
                    $phptime = "Y-m-d";
                    break;
                case "%m.%d.%Y":
                    $picker = "yyyy.mm.dd";
                    $phptime = "Y.m.d";
                    break;
                case "%m-%d-%y":
                    $picker = "mm-dd-yy";
                    $phptime = "m-d-y";
                    break;
                case "%d-%m-%y":
                    $picker = "dd-mm-yy";
                    $phptime = "d-m-y";
                    break;
                case "%d.%m.%Y":
                    $picker = "dd.mm.yyyy";
                    $phptime = "d.m.Y";
                    break;
                case "%Y.%m.%d":
                    $picker = "yyyy.mm.dd";
                    $phptime = "Y.m.d";
                    break;
            }


            Config::updateorCreate(
                ['key' => 'date_picker_format'],
                ['value' => $picker]
            );

            Config::updateorCreate(
                ['key' => 'date_time_format'],
                ['value' => $phptime]
            );
        }




        return back()->with(flash(trans('settings.company_system_updated'), 'success'))->with('pill', 'company-system');
    }
}