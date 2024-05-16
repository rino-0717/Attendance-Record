<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('after_or_equal_next_day', function ($attribute, $value, $parameters, $validator) {
            $startTime = \Carbon\Carbon::createFromFormat('H:i', $value);
            $endTime = \Carbon\Carbon::createFromFormat('H:i', $parameters[0]);

            // 終了時間が開始時間より前であれば、翌日の時間と見なす
            if ($endTime->lt($startTime)) {
                $endTime->addDay(); // 翌日に設定
            }

            return $startTime->lte($endTime);
        }, 'The :attribute must be before or equal to the end time on the next day.');
    }
}
