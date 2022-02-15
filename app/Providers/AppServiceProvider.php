<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class AppServiceProvider extends ServiceProvider
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
    public function boot(Request $request)
    {
        //$student = session('LoggedStudentInfo');
        //var_dump ($request->session()->get('LoggedStudentInfo'));
        //View::share('LoggedStudentInfo', $student);
        //
    }
}
