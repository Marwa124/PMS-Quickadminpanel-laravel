<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Mail\TestMail;
use App\Mail\MailgunMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\TwilioNotification;
use Plivo\RestClient;

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    // Route::get('settings', 'SettingController@show_templates')->name('admin.settings.index');

    Route::get('settings/templates', 'SettingController@show_templates')->name('admin.settings.templates.index');
    Route::get('settings/details', 'SettingController@show_details')->name('admin.settings.details.index');
    Route::get('settings/system', 'SettingController@show_system')->name('admin.settings.system.index');
    Route::get('settings/email', 'SettingController@show_email')->name('admin.settings.email.index');
    Route::get('settings/sms', 'SettingController@show_sms')->name('admin.settings.sms.index');
    Route::get('settings/invoice', 'SettingController@show_invoice')->name('admin.settings.invoice.index');
    Route::get('settings/estimate', 'SettingController@show_estimate')->name('admin.settings.estimate.index');

    Route::get('settings/proposal', 'SettingController@show_proposal')->name('admin.settings.proposal.index');
    Route::get('settings/purchase', 'SettingController@show_purchase')->name('admin.settings.purchase.index');


    Route::post('save_details', 'SettingController@save_details')->name('admin.details.store');
    Route::post('save_system', 'SettingController@save_system')->name('admin.system.store');


    Route::post('save_currency', 'SettingController@save_currency')->name('admin.currency.store');
    Route::post('update_currency', 'SettingController@update_currency')->name('admin.currency.update');
    Route::post('remove_currency', 'SettingController@remove_currency')->name('admin.currency.remove');


    Route::post('save_mail_smtp', 'SettingController@save_mail_smtp')->name('admin.mail_smtp.store');

    Route::post('save_mail_mailgun', 'SettingController@save_mail_mailgun')->name('admin.mail_mailgun.store');
    Route::post('send_test_mail', 'SettingController@send_test_mail')->name('admin.test_mail');
    Route::post('save_sms', 'SettingController@save_sms')->name('admin.save_sms');
    Route::post('test-sms', 'SettingController@test_sms')->name('admin.sms.test');
    Route::post('update_templates', 'SettingController@update_templates')->name('admin.update.templates');
    Route::post('update_invoice_settings', 'SettingController@update_invoice')->name('admin.invoice.settings.store');


    Route::post('update_estimate_settings', 'SettingController@update_estimate')->name('admin.estimate.settings.store');

    Route::post('update_proposal_settings', 'SettingController@update_proposal')->name('admin.proposal.settings.store');
    Route::post('update_purchase_settings', 'SettingController@update_purchase')->name('admin.purchase.settings.store');
});
