<?php

namespace App\Providers;

use App\Models\Phonebook;
use App\Observers\PhonebookObserver;
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
        Phonebook::observe(PhonebookObserver::class);
    }
}
