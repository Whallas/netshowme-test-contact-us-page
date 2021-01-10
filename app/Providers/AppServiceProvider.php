<?php

namespace App\Providers;

use App\Models\ContactRequest;
use App\Models\Contracts\ContactRequest as ContactRequestContract;
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
        $this->app->bind(ContactRequestContract::class, ContactRequest::class);
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
