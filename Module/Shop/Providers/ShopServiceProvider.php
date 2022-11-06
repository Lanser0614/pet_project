<?php
declare(strict_types=1);

namespace Module\Shop\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    protected $namespace = "Module\Shop\Http\Controllers";

    protected $apiPrefix = "/api/v1/";

    protected $defer = false;

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->registerConfig();
        $this->routes();

//        if ($this->app->runningInConsole()) {
//            $this->registerMigrations();
//        }

//        $this->loadingRepositories();
    }

//    public function loadingRepositories()
//    {
//        $this->app->bind(IContactWriteRepository::class, ContactWriteRepository::class);
//        $this->app->bind(IContactReadRepository::class, ContactReadRepository::class);
//    }

    /**
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php",
            "Shop"
        );
    }

    /**
     * @return void
     */
    public function routes(): void
    {
        Route::prefix($this->apiPrefix)
            ->namespace($this->namespace)
            ->middleware("api")
            ->group(__DIR__ . "/../routes/route.php");
    }
}
