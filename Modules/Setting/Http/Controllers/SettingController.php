<?php

namespace Modules\Setting\Http\Controllers;

use Gate;
use App\Mail\TestMail;
use App\Models\Config;
use App\Models\Locale;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
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
    public function show_details()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $countries  = Country::all();


        return view(
            'setting::settings.company_details',
            compact(
                'countries'


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



    public function show_system()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


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
            'setting::settings.company_system',
            compact(
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





    public function show_email()
    {



        return view('setting::settings.email_settings');
    }



    public function save_mail_mailgun(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'mailgun_email' => 'required|email',
            'mailgun_sender_name' => 'required|string',
            'mailgun_protocol' => 'required|in:smtp,mailgun',

            'mailgun_host' => 'required|string',
            'mailgun_user' => 'required|string',

            'mailgun_password' => 'required|string',

            'mailgun_port' => 'required|integer',

            'mailgun_encryption' => 'required|in:tls,ssl',



        ], [


            'mailgun_email.required'         => 'Company email is required',
            'mailgun_email.email'            => 'Company email Isn\'t Valid',

            'mailgun_sender_name.required'           => 'Sender Name is required',
            'mailgun_sender_name.string'             => 'Sender Name Should Be String',

            'mailgun_host.required'             => 'Mail Host is required',
            'mailgun_host.string'                => 'Mail Host Isn\'t Valid',

            'mailgun_password.required'                => 'Mail Password is required',
            'mailgun_password.string'                  => 'Mail Password Should Be String',

            'mailgun_port.required'                    => 'Mail Port is required',
            'mailgun_port.string'                      => 'Mail Port Should Be Integer',

            'mailgun_encryption.required'              => 'Mail Encryption is required',
            'mailgun_encryption.in'                    => 'Mail Encryption is Invalid',




        ]);


        if ($validator->fails()) {

            return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'email-settings');
        }

        $validated_inputs =  array_diff_key($validator->getData(), array_flip(["_token"]));

        foreach ($validated_inputs as $key => $value) {

            Config::updateorCreate(
                ['key' => $key],
                ['value' => is_array($value) ? serialize($value) : $value]
            );
        }

        return back()->with(flash(trans('settings.mailgun_updated'), 'success'))->with('pill', 'email-settings');
    }



    public function save_mail_smtp(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'smtp_email' => 'required|email',
            'smtp_sender_name' => 'required|string',
            'smtp_protocol' => 'required|in:smtp',

            'smtp_host' => 'required|string',
            'smtp_user' => 'required|string',

            'smtp_password' => 'required|string',

            'smtp_port' => 'required|integer',

            'smtp_encryption' => 'required|in:tls,ssl',



        ], [
            'smtp_email.required'         => 'Company email is required',
            'smtp_email.email'            => 'Company email Isn\'t Valid',

            'smtp_sender_name.required'           => 'Sender Name is required',
            'smtp_sender_name.string'             => 'Sender Name Should Be String',

            'smtp_host.required'             => 'Mail Host is required',
            'smtp_host.string'                => 'Mail Host Isn\'t Valid',

            'smtp_password.required'                => 'Mail Password is required',
            'smtp_password.string'                  => 'Mail Password Should Be String',

            'smtp_port.required'                    => 'Mail Port is required',
            'smtp_port.string'                      => 'Mail Port Should Be Integer',

            'smtp_encryption.required'              => 'Mail Encryption is required',
            'smtp_encryption.in'                    => 'Mail Encryption is Invalid',




        ]);


        if ($validator->fails()) {

            return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'email-settings');
        }

        $validated_inputs =  array_diff_key($validator->getData(), array_flip(["_token"]));

        foreach ($validated_inputs as $key => $value) {

            Config::updateorCreate(
                ['key' => $key],
                ['value' => is_array($value) ? serialize($value) : $value]
            );
        }

        return back()->with(flash(trans('settings.mail_updated'), 'success'))->with('pill', 'email-settings');
    }



    function send_test_mail(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'mailer' => 'required|in:mailgun,smtp',
            'test_email' => 'required|string|email'

        ]);



        if ($validator->fails()) {

            return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'email-settings');
        }

        try {
            $sender =  request('mailer') == 'smtp' ? settings('smtp_sender_name') : settings('mailgun_sender_name');
            $email_from =  request('mailer') == 'smtp' ? settings('smtp_email') : settings('mailgun_email');

            Mail::mailer($request->mailer)->to(request('test_email'))->send(new TestMail($email_from, $sender));
            return back()->with(flash(trans('settings.mail_sent'), 'success'))->with('pill', 'email-settings');
        } catch (\Exception $e) {
            return back()->with(flash(trans('settings.mail_configurations_not_set'), 'danger'))->with('pill', 'email-settings');
        }
    }


    public function show_sms()
    {
        $triggers = get_available_triggers();
        return view('setting::settings.sms_settings', compact('triggers'));
    }

    public function save_sms(Request $request)
    {

        try {

            if ($request->has('sms_status')) {

                if ($request->sms_status == 'twilio') {
                    $validator = Validator::make($request->all(), [

                        'twilio_account_sid'  => 'required|string',
                        'twilio_token_auth'   => 'required|string',
                        'twilio_phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:5|max:20',

                    ], [

                        'twilio_account_sid.required'  => trans('settings.twilio_account_sid_required'),
                        'twilio_account_sid.string'    => trans('settings.twilio_account_sid_string'),

                        'twilio_token_auth.required'  => trans('settings.twilio_token_auth_required'),
                        'twilio_token_auth.string'    => trans('settings.twilio_token_auth_string'),

                        'twilio_phone_number.required'  => trans('settings.twilio_phone_number_required'),
                        'twilio_phone_number.string'    => trans('settings.twilio_phone_number_string'),

                        'twilio_phone_number.regex'     => trans('settings.twilio_phone_number_regex'),


                    ]);

                    if ($validator->fails()) {

                        return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'sms-settings');
                    }

                    Config::updateorCreate(
                        ['key' => 'twilio_account_sid'],
                        ['value' => request('twilio_account_sid')]
                    );

                    Config::updateorCreate(
                        ['key' => 'twilio_phone_number'],
                        ['value' => request('twilio_phone_number')]
                    );
                    Config::updateorCreate(
                        ['key' => 'twilio_token_auth'],
                        ['value' => request('twilio_token_auth')]
                    );
                }

                if ($request->sms_status == 'nexmo') {

                    $validator = Validator::make($request->all(), [

                        'nexmo_account_sid'  => 'required|string',
                        'nexmo_token_auth'   => 'required|string',
                        'nexmo_phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:5|max:20',

                    ], [

                        'nexmo_account_sid.required'  => trans('settings.nexmo_account_sid_required'),
                        'nexmo_account_sid.string'    => trans('settings.nexmo_account_sid_string'),

                        'nexmo_token_auth.required'  => trans('settings.nexmo_token_auth_required'),
                        'nexmo_token_auth.string'    => trans('settings.nexmo_token_auth_string'),

                        'nexmo_phone_number.required'  => trans('settings.nexmo_phone_number_required'),
                        'nexmo_phone_number.string'    => trans('settings.nexmo_phone_number_string'),



                    ]);

                    if ($validator->fails()) {

                        return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'sms-settings');
                    }

                    Config::updateorCreate(
                        ['key' => 'nexmo_account_sid'],
                        ['value' => request('nexmo_account_sid')]
                    );

                    Config::updateorCreate(
                        ['key' => 'nexmo_phone_number'],
                        ['value' => request('nexmo_phone_number')]
                    );
                    Config::updateorCreate(
                        ['key' => 'nexmo_token_auth'],
                        ['value' => request('nexmo_token_auth')]
                    );
                }
            }


            $validator = Validator::make($request->all(), [

                'sms_invoice_reminder'              => 'sometimes|nullable|string',
                'sms_invoice_overdue'               => 'sometimes|nullable|string',
                'sms_payment_recorded'              => 'sometimes|nullable|string',
                'sms_estimate_exp_reminder'         => 'sometimes|nullable|string',
                'sms_proposal_exp_reminder'         => 'sometimes|nullable|string',
                'sms_purchase_confirmation'         => 'sometimes|nullable|string',
                'sms_purchase_payment_confirmation' => 'sometimes|nullable|string',
                'sms_return_stock'                  => 'sometimes|nullable|string',
                'sms_transaction_record'            => 'sometimes|nullable|string',
                'sms_staff_reminder'                => 'sometimes|nullable|string',
            ], [
                'sms_invoice_reminder.string'              => trans('settings.sms_invoice_reminder_string'),
                'sms_invoice_overdue.string'               => trans('settings.sms_invoice_overdue_string'),
                'sms_payment_recorded.string'              => trans('settings.sms_payment_recorded_string'),
                'sms_estimate_exp_reminder.string'         => trans('settings.sms_estimate_exp_reminder_string'),
                'sms_proposal_exp_reminder.string'         => trans('settings.sms_proposal_exp_reminder_string'),
                'sms_purchase_confirmation.string'         => trans('settings.sms_purchase_confirmation_string'),
                'sms_purchase_payment_confirmation.string' => trans('settings.sms_purchase_payment_confirmation_string'),
                'sms_return_stock.string'                  => trans('settings.sms_return_stock_string'),
                'sms_transaction_record.string'            => trans('settings.sms_transaction_record_string'),
                'sms_staff_reminder.string'                => trans('settings.sms_staff_reminder_string'),
            ]);

            if ($validator->fails()) {

                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'sms-settings');
            }


            Config::updateorCreate(
                ['key' => 'sms_invoice_reminder'],
                ['value' => request('sms_invoice_reminder')]
            );

            Config::updateorCreate(
                ['key' => 'sms_invoice_overdue'],
                ['value' => request('sms_invoice_overdue')]
            );
            Config::updateorCreate(
                ['key' => 'sms_payment_recorded'],
                ['value' => request('sms_payment_recorded')]
            );

            Config::updateorCreate(
                ['key' => 'sms_estimate_exp_reminder'],
                ['value' => request('sms_estimate_exp_reminder')]
            );

            Config::updateorCreate(
                ['key' => 'sms_proposal_exp_reminder'],
                ['value' => request('sms_proposal_exp_reminder')]
            );


            Config::updateorCreate(
                ['key' => 'sms_purchase_confirmation'],
                ['value' => request('sms_purchase_confirmation')]
            );
            Config::updateorCreate(
                ['key' => 'sms_purchase_payment_confirmation'],
                ['value' => request('sms_purchase_payment_confirmation')]
            );

            Config::updateorCreate(
                ['key' => 'sms_return_stock'],
                ['value' => request('sms_return_stock')]
            );

            Config::updateorCreate(
                ['key' => 'sms_transaction_record'],
                ['value' => request('sms_transaction_record')]
            );
            Config::updateorCreate(
                ['key' => 'sms_staff_reminder'],
                ['value' => request('sms_staff_reminder')]
            );
            Config::updateorCreate(
                ['key' => 'sms_status'],
                ['value' => request('sms_status')]
            );

            return back()->with(flash(trans('settings.sms_updated'), 'success'))->with('pill', 'sms-settings');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function test_sms(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'msg'                   => 'required|string',
            'type'                  => 'required|string|in:twilio,nexmo',
            'phone'                 => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->all()[0]], 400);
        }

        try {
            if (request('type') == 'twilio') {
                // '+2001123408535'
                sendMsgByTwilio(request('msg'), request('phone'));
            } else if (request('type') == 'nexmo') {

                sendMsgByNexmo(request('msg'), request('phone'));
            }

            return response()->json(['message' => trans('settings.message_sent')], 200);
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage() . 'Something went Wrong'], 400);
        }
    }




    public function show_templates()
    {

        return view('setting::settings.email_templates');
    }

    function update_templates(Request $request)
    {


        try {


            $validator = Validator::make($request->all(), [
                'email_group'     => 'required|string|exists:email_templates,email_group',
                'subject'  => 'required|string',
                'email_template'     => 'required|string'
            ]);


            if ($validator->fails()) {
                return back()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'email-templates');
            }

            $template = EmailTemplate::where('email_group', $request->email_group)->first();
            if (!$template) {

                abort(404);
            }



            $template->update(['subject' => $request->subject, 'template_body' => $request->email_template]);


            return back()->with(flash(trans('settings.template_updated'), 'success'))->with('pill', 'email-templates')->with('template', request('email_group'))->with('tab', request('tab'));
        } catch (\Exception $e) {
            return back()->with(flash('Something went Wrong', 'danger'))->with('pill', 'email-templates');
        }
    }



    public function show_invoice()
    {
        return view('setting::settings.invoice');
    }


    public function update_invoice(Request $request)
    {


        try {

            $validator = Validator::make($request->all(), [
                'invoice_prefix' => 'required|string',
                'invoices_due_after' => 'required|integer',
                'invoice_start_no' => 'required|integer',

                'invoice_number_format' => 'sometimes|nullable|string',

                'qty_calculation_from_items' => 'sometimes|nullable|in:yes,no',

                'amount_to_words' => 'sometimes|nullable|in:yes,no',

                'allow_customer_edit_amount' => 'sometimes|nullable|in:yes,no',
                'increment_invoice_number' => 'sometimes|nullable|in:yes,no',
                'show_item_tax' => 'sometimes|nullable|in:yes,no',
                'send_email_when_recur' => 'sometimes|nullable|in:yes,no',
                'invoice_view' => 'sometimes|nullable|in:0,1',
                'invoice_logo' => 'sometimes|nullable|mimes:jpeg,png,jpg,gif,svg',
                'default_terms' => 'sometimes|nullable|string',
                'invoice_footer' => 'sometimes|nullable|string',
            ], [


                'invoice_prefix.required'         => trans('settings.invoice_prefix_required'),
                'invoice_prefix.string'           => trans('settings.invoice_prefix_string'),

                'invoices_due_after.required'     => trans('settings.invoices_due_after_required'),
                'invoices_due_after.integer'      => trans('settings.invoices_due_after_integer'),

                'invoice_start_no.required'       => trans('settings.invoice_start_no_required'),
                'invoice_start_no.integer'        => trans('settings.invoice_start_no_integer'),

                'invoice_number_format.string'    => trans('settings.invoice_number_format_string'),
                'qty_calculation_from_items.in'   => trans('settings.qty_calculation_from_items_in'),
                'amount_to_words.in'              => trans('settings.amount_to_words_in'),
                'allow_customer_edit_amount.in'   => trans('settings.allow_customer_edit_amount_in'),
                'increment_invoice_number.in'     => trans('settings.increment_invoice_number_in'),

                'show_item_tax.in'                => trans('settings.show_item_tax_in'),
                'send_email_when_recur.in'        => trans('settings.send_email_when_recur_in'),
                'invoice_logo.mimes'              => trans('settings.invoice_logo_mimes'),

                'default_terms.string'            => trans('settings.default_terms_string'),
                'invoice_footer.string'           => trans('settings.invoice_footer_string'),



            ]);


            if ($validator->fails()) {
                return back()->with(flash($validator->errors()->all()[0], 'danger'))->with('pill', 'invoice');
            }


            Config::updateorCreate(
                ['key' => 'invoice_prefix'],
                ['value' => request('invoice_prefix')]
            );

            Config::updateorCreate(
                ['key' => 'invoices_due_after'],
                ['value' => request('invoices_due_after')]
            );
            Config::updateorCreate(
                ['key' => 'invoice_start_no'],
                ['value' => request('invoice_start_no')]
            );

            Config::updateorCreate(
                ['key' => 'invoice_number_format'],
                ['value' => request('invoice_number_format')]
            );

            Config::updateorCreate(
                ['key' => 'qty_calculation_from_items'],
                ['value' => request('qty_calculation_from_items')]
            );


            Config::updateorCreate(
                ['key' => 'amount_to_words'],
                ['value' => request('amount_to_words')]
            );
            Config::updateorCreate(
                ['key' => 'allow_customer_edit_amount'],
                ['value' => request('allow_customer_edit_amount')]
            );

            Config::updateorCreate(
                ['key' => 'increment_invoice_number'],
                ['value' => request('increment_invoice_number')]
            );

            Config::updateorCreate(
                ['key' => 'show_item_tax'],
                ['value' => request('show_item_tax')]
            );
            Config::updateorCreate(
                ['key' => 'send_email_when_recur'],
                ['value' => request('send_email_when_recur')]
            );
            Config::updateorCreate(
                ['key' => 'invoice_view'],
                ['value' => request('invoice_view')]
            );

            if ($request->file('invoice_logo')) {


                $imageName = time() . '-inv.' . $request->invoice_logo->extension();

                $request->invoice_logo->move(public_path('settings/invoice/.'), $imageName);
                Config::updateorCreate(
                    ['key' => 'invoice_logo'],
                    ['value' => $imageName]
                );
            }



            Config::updateorCreate(
                ['key' => 'default_terms'],
                ['value' => request('default_terms')]
            );
            Config::updateorCreate(
                ['key' => 'invoice_footer'],
                ['value' => request('invoice_footer')]
            );

            return back()->with(flash(trans('settings.invoice_updated'), 'success'))->with('pill', 'invoice');
        } catch (\Exception $e) {

            return back()->with(flash('something went wrong', 'danger'));
        }
    }


    public function show_estimate()
    {
        return view('setting::settings.estimate');
    }







    public function update_estimate(Request $request)
    {


        try {

            $validator = Validator::make($request->all(), [
                'estimate_prefix' => 'required|string',
                'estimate_start_no' => 'required|integer',

                'estimate_number_format' => 'sometimes|nullable|string',

                'increment_estimate_number' => 'sometimes|nullable|in:yes,no',
                'show_estimate_tax' => 'sometimes|nullable|in:yes,no',
                'estimate_terms' => 'sometimes|nullable|string',
                'estimate_footer' => 'sometimes|nullable|string',
            ], [


                'estimate_prefix.required'         => trans('settings.estimate_prefix_required'),
                'estimate_prefix.string'           => trans('settings.estimate_prefix_string'),

                'estimate_start_no.required'       => trans('settings.estimate_start_no_required'),
                'estimate_start_no.integer'        => trans('settings.estimate_start_no_integer'),

                'estimate_number_format.string'    => trans('settings.estimate_number_format_string'),

                'increment_estimate_number.in'     => trans('settings.increment_estimate_number_in'),

                'show_estimate_tax.in'                => trans('settings.show_item_tax_in'),

                'estimate_terms.string'            => trans('settings.estimate_terms_string'),
                'estimate_footer.string'           => trans('settings.estimate_footer_string'),



            ]);


            if ($validator->fails()) {
                return back()->with(flash($validator->errors()->all()[0], 'danger'));
            }


            Config::updateorCreate(
                ['key' => 'estimate_prefix'],
                ['value' => request('estimate_prefix')]
            );


            Config::updateorCreate(
                ['key' => 'estimate_start_no'],
                ['value' => request('estimate_start_no')]
            );

            Config::updateorCreate(
                ['key' => 'estimate_number_format'],
                ['value' => request('estimate_number_format')]
            );



            Config::updateorCreate(
                ['key' => 'increment_estimate_number'],
                ['value' => request('increment_estimate_number')]
            );

            Config::updateorCreate(
                ['key' => 'show_estimate_tax'],
                ['value' => request('show_estimate_tax')]
            );


            Config::updateorCreate(
                ['key' => 'estimate_terms'],
                ['value' => request('estimate_terms')]
            );
            Config::updateorCreate(
                ['key' => 'estimate_footer'],
                ['value' => request('estimate_footer')]
            );

            return back()->with(flash(trans('settings.estimate_updated'), 'success'));
        } catch (\Exception $e) {

            return back()->with(flash('something went wrong', 'danger'));
        }
    }






    public function show_proposal()
    {
        return view('setting::settings.proposal');
    }







    public function update_proposal(Request $request)
    {


        try {

            $validator = Validator::make($request->all(), [
                'proposal_prefix' => 'required|string',
                'proposal_start_no' => 'required|integer',

                'proposal_number_format' => 'sometimes|nullable|string',

                'increment_proposal_number' => 'sometimes|nullable|in:yes,no',
                'show_proposal_tax' => 'sometimes|nullable|in:yes,no',
                'proposal_terms' => 'sometimes|nullable|string',
                'proposal_footer' => 'sometimes|nullable|string',
            ], [


                'proposal_prefix.required'         => trans('settings.proposal_prefix_required'),
                'proposal_prefix.string'           => trans('settings.proposal_prefix_string'),

                'proposal_start_no.required'       => trans('settings.proposal_start_no_required'),
                'proposal_start_no.integer'        => trans('settings.proposal_start_no_integer'),

                'proposal_number_format.string'    => trans('settings.proposal_number_format_string'),

                'increment_proposal_number.in'     => trans('settings.increment_proposal_number_in'),

                'show_proposal_tax.in'             => trans('settings.show_item_tax_in'),

                'proposal_terms.string'            => trans('settings.proposal_terms_string'),
                'proposal_footer.string'           => trans('settings.proposal_footer_string'),



            ]);


            if ($validator->fails()) {
                return back()->with(flash($validator->errors()->all()[0], 'danger'));
            }


            Config::updateorCreate(
                ['key' => 'proposal_prefix'],
                ['value' => request('proposal_prefix')]
            );


            Config::updateorCreate(
                ['key' => 'proposal_start_no'],
                ['value' => request('proposal_start_no')]
            );

            Config::updateorCreate(
                ['key' => 'proposal_number_format'],
                ['value' => request('proposal_number_format')]
            );



            Config::updateorCreate(
                ['key' => 'increment_proposal_number'],
                ['value' => request('increment_proposal_number')]
            );

            Config::updateorCreate(
                ['key' => 'show_proposal_tax'],
                ['value' => request('show_proposal_tax')]
            );


            Config::updateorCreate(
                ['key' => 'proposal_terms'],
                ['value' => request('proposal_terms')]
            );
            Config::updateorCreate(
                ['key' => 'proposal_footer'],
                ['value' => request('proposal_footer')]
            );

            return back()->with(flash(trans('settings.proposal_updated'), 'success'));
        } catch (\Exception $e) {

            return back()->with(flash('something went wrong', 'danger'));
        }
    }











    public function show_purchase()
    {
        return view('setting::settings.purchase');
    }







    public function update_purchase(Request $request)
    {


        try {

            $validator = Validator::make($request->all(), [
                'purchase_prefix'             => 'required|string',
                'purchase_start_no'           => 'required|string',

                'purchase_number_format'      => 'sometimes|nullable|string',
                'return_stock_prefix'         => 'required|string',
                'return_stock_number_format'  => 'required|string',

                'return_stock_start_no'      => 'sometimes|nullable|string',

                'purchase_notes' => 'sometimes|nullable|string',
            ], [


                'purchase_perfix.required'         => trans('settings.purchase_perfix_required'),
                'purchase_perfix.string'           => trans('settings.purchase_perfix_string'),

                'purchase_start_no.required'       => trans('settings.purchase_start_no_required'),
                'purchase_start_no.string'        => trans('settings.purchase_start_no_string'),

                'purchase_number_format.string'    => trans('settings.purchase_number_format_string'),



                'return_stock_prefix.required'         => trans('settings.return_stock_prefix_required'),
                'return_stock_prefix.string'           => trans('settings.return_stock_prefix_string'),

                'return_stock_start_no.required'       => trans('settings.return_stock_start_no_required'),
                'return_stock_start_no.integer'        => trans('settings.return_stock_start_no_integer'),

                'return_stock_number_format.string'    => trans('settings.return_stock_number_format_string'),




                '.string'           => trans('settings.purchase_notes_string'),



            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
            }



            Config::updateorCreate(
                ['key' => 'purchase_prefix'],
                ['value' => request('purchase_prefix')]
            );


            Config::updateorCreate(
                ['key' => 'purchase_number_format'],
                ['value' => request('purchase_number_format')]
            );

            Config::updateorCreate(
                ['key' => 'purchase_start_no'],
                ['value' => request('purchase_start_no')]
            );




            Config::updateorCreate(
                ['key' => 'return_stock_prefix'],
                ['value' => request('return_stock_prefix')]
            );


            Config::updateorCreate(
                ['key' => 'return_stock_number_format'],
                ['value' => request('return_stock_number_format')]
            );

            Config::updateorCreate(
                ['key' => 'return_stock_start_no'],
                ['value' => request('return_stock_start_no')]
            );





            Config::updateorCreate(
                ['key' => 'purchase_notes'],
                ['value' => request('purchase_notes')]
            );

            return back()->with(flash(trans('settings.purchase_updated'), 'success'));
        } catch (\Exception $e) {

            return back()->with(flash('something went wrong', 'danger'));
        }
    }
}
