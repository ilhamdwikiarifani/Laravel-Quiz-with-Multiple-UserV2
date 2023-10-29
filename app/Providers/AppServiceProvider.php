<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Master;
use App\Models\UserExam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
                $view->with('countApply', UserExam::where('user_id', Auth::user()->id)->where('master_join', 1)->count());
            } else {
                $view->with('countApply', null);
            }
        });

        Gate::define('admin', function (User $user) {
            return $user->role->name == 'admin';
        });
    }
}
