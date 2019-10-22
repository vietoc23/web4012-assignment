<?php

namespace App\Providers;

use App\Http\View\Composers\CategoryListingComposer;
use App\Http\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'layouts.header', 
                'layouts.sidebar',
                'frontpage.post',
                'frontpage.navigation',
                'frontpage.profile.*'
            ], ProfileComposer::class
        );

        View::composer(
            [
                'frontpage.category-widget',
            ], CategoryListingComposer::class
        );
    }
}
