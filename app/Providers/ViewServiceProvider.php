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
          $notificationCount = auth()->user() ? auth()->user()
              ->notifications()->where('userables.is_read',0)->count() : 0;

            // dd(auth()->user()->notifications()->where('userables.is_read',0)->count());

          $view->with(compact('notificationCount'));
      });
    }
}
