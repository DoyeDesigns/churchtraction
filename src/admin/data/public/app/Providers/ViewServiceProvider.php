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

        // Using class based composers...
        View::composer(
            ['layouts.admin','layouts.member'], 'App\Http\View\Composers\AdminComposer'
        );

        View::composer(
            ['layouts.site','auth.login','auth.register','auth.social.form'], 'App\Http\View\Composers\SiteComposer'
        );
/*        // Using Closure based composers...
        View::composer('dashboard', function ($view) {
            //
        });*/


    }
}