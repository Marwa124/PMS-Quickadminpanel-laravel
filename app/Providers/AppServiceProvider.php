<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        try {

            config(['mail.from.address' => settings('company_email')]);
            config(['mail.from.name' => settings('sender_name')]);
            // config(['mail.default' => settings('smtp_protocol', 'smtp')]);


            config(['mail.mailers.smtp.host' => settings('smtp_host', 'smtp.mailgun.org')]);

            config(['mail.mailers.smtp.port' => settings('smtp_port', 587)]);
            config(['mail.mailers.smtp.encryption' => settings('smtp_encryption', 'tls')]);
            config(['mail.mailers.smtp.username' => settings('smtp_user')]);
            config(['mail.mailers.smtp.password' => settings('smtp_password')]);




            // config(['services.mailgun.domain' => 'https://api.mailgun.net/v3/sandboxe31bb8c7d4b44782a216a3ee62328fc9.mailgun.org']);
            // config(['services.mailgun.secret' => '39b0cfa01c5e1dbeb25d8e3f460a57b0-4de08e90-e2edd9a8']);





            // config(['mail.default' => settings('mailgun_protocol', 'smtp')]);
            config(['mail.mailers.mailgun.host' => settings('mailgun_host', 'smtp.mailgun.org')]);

            config(['mail.mailers.mailgun.port' => settings('mailgun_port', 587)]);
            config(['mail.mailers.mailgun.encryption' => settings('mailgun_encryption', 'tls')]);
            config(['mail.mailers.mailgun.username' => settings('mailgun_user')]);
            config(['mail.mailers.mailgun.password' => settings('mailgun_password')]);


            // config(['mail.from.name' => settings('sender_name')]);





            config(['app.timezone' => settings('timezone')]);
        } catch (\Exception $e) {
        }
    }
}