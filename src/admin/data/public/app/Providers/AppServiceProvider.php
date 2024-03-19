<?php

namespace App\Providers;

use App\Lib\Helpers;
use Illuminate\Mail\TransportManager;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
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
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        ///Paginator::useBootstrapThree();
        //boot define file path
        define('UPLOAD_PATH',config('app.upload_path'));

        define('ATTACHMENTS','attachments');
        define('DEPARTMENTS','departments');
        define('DOWNLOADS','downloads');
        define('FORUM','forum');
        define('GALLERIES','galleries');
        define('IMAGES','images');
        define('MEMBERS','members');
        define('SETTINGS','settings');
        define('TEMP_DIR','../storage/tmp/');

        define('ATTACHMENT_PATH',UPLOAD_PATH.'/attachments');
        define('DOWNLOAD_PATH',UPLOAD_PATH.'/downloads');
        define('FORUM_PATH',UPLOAD_PATH.'/forum');
        define('MEMBER_PATH',UPLOAD_PATH.'/members');
        define('SETTINGS_PATH',UPLOAD_PATH.'/settings');
        Helpers::bootProviders();

    }
}
