<?php
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Module\Product\Providers\ProductServiceProvider;
use Module\Shop\Providers\ShopServiceProvider;
use Module\User\Providers\UserServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->register(UserServiceProvider::class);
        $this->app->register(ShopServiceProvider::class);
        $this->app->register(ProductServiceProvider::class);
    }
}
