<?php

namespace App\Providers;

use App\Models\Master;
use App\Models\UserExam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $view->with('countExam', Master::where('status', 1)->count());
                $view->with('countApply', UserExam::where('user_id', Auth::user()->id)->where('master_join', 1)->count());
            } else {
                $view->with('countApply', null);
            }
        });
    }
}
