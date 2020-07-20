<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\SystemSetting;
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
        $favicon_logo = DB::table('system_settings')->select( 'setting_value')->where('setting_field', 'favicon_logo')->first();
        $header_logo = DB::table('system_settings')->select('setting_value')->where('setting_field', 'header_logo')->first();

        view()->share(['favicon_logo'=> $favicon_logo,'header_logo'=> $header_logo,]);
    }
}
