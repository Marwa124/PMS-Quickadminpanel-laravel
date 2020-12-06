<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //compose all the views....
        view()->composer('*', function ($view) {
            $notificationCount = auth()->user() ? auth()->user()->unreadNotifications()->count() : 0;
            // $notificationCount = auth()->user() ? auth()->user()->notifications()->where('userables.is_read',0)->count() : 0;

          $view->with(compact('notificationCount'));
      });
    }
}
