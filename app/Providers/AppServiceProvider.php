<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*', function ($view) {            
            $locale = config('app.locale');
            
            if (file_exists(resource_path('lang/' . $locale . '.json')))
                $translations = file_get_contents(resource_path('lang/' . $locale . '.json'));
            else
                $translations = '[]';

            $view->with([
                'locale' => $locale,
                'direction' => $locale == 'ar' || $locale == 'he' ? 'rtl' : 'ltr',
                'translations' => json_decode($translations, true),
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
