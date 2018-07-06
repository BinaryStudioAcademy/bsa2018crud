<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CurrencyRepositoryInterface;
use App\Services\BaseCurrencyRepository;
use App\Services\Currency;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CurrencyRepositoryInterface::class, 
            function() {
                return new BaseCurrencyRepository([
                    new Currency(
                        1,
                        'somecoin',
                        'btc',
                        1000,
                        new \DateTime(),
                        true
                    ),
                    new Currency(
                        2,
                        'somecoin',
                        'btc',
                        1000,
                        new \DateTime(),
                        true
                    ),
                    new Currency(
                        3,
                        'somecoin',
                        'btc',
                        1000,
                        new \DateTime(),
                        false
                    )
                ]);
            }        
        );
    }
}
