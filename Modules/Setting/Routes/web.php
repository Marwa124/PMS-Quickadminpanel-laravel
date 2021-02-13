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

    Route::get('settings', 'SettingController@company_details')->name('admin.settings.index');


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
});