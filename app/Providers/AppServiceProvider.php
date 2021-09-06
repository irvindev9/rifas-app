<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

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
        $whatsapp_number = strip_tags(Setting::where('code', 'whatsapp')->first()->content);
        $whatsapp = strip_tags(Setting::where('code', 'whatsapp_config')->first()->content);

        View::share('whatsapp_number', $whatsapp_number);
        View::share('whatsapp', $whatsapp);
    }
}
