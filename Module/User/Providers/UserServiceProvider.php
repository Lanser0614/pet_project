<?php
declare(strict_types=1);

namespace Module\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{


    protected $namespace = "Module\User\Http\Controllers";

    protected $apiPrefix = "/api/v1/";

    protected $defer = false;

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
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php",
            "user"
        );
    }

    public function routes()
    {
        Route::prefix($this->apiPrefix)
            ->namespace($this->namespace)
            ->middleware("api")
            ->group(__DIR__ . "/../routes/route.php");
    }
}
