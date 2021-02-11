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
use App\Notifications\PlivoNotification;
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

    Route::get('testmail', function () {

        try {
            Mail::mailer(settings('smtp_protocol'))->to('shadyosamafawzy@gmail.com')->send(new TestMail());
            dd('sent');
        } catch (\Exception $e) {

            dd($e->getMessage() . ' Something went wrong');
        }
    });


    Route::get('testmailgun', function () {

        try {
            Mail::mailer(settings('mailgun_protocol'))->to('shadyosamafawzy@gmail.com')->send(new MailgunMail());
            dd('sent');
        } catch (\Exception $e) {

            dd($e->getMessage() . ' Something went wrong');
        }
    });


    Route::get('testMsg', function () {

        auth()->user()->notify(new TwilioNotification());
    });

    Route::get('testplivo', function () {



        $client = new RestClient("MAMWFMNJAWNMI1N2UWNM", "NGI2Mzc4MDhmOTA3ZGQ2OGYyZmMyYjdjYzU0YjFh");


        $message_created = $client->messages->create(
            '+13043559141',
            ['+2001006143107'],
            'Hello, world!'
        );

        // auth()->user()->notify(new PlivoNotification());
    });
});