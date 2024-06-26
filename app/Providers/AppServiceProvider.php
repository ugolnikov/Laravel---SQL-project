<?php

namespace App\Providers;

use App\Rules\UniqueStudent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

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
    public function boot()
    {
        Validator::extend('unique_student', function ($attribute, $value, $parameters, $validator) {
            $rule = new UniqueStudent();
            return $rule->passes($attribute, $value);
        }, 'Ученик с такими ФИО и датой рождения уже существует.');
    }
}
