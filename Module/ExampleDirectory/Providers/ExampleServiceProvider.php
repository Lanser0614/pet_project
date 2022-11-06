<?php
declare(strict_types=1);

namespace Module\ExampleDirectory\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ExampleServiceProvider extends ServiceProvider
{
    protected $namespace = "Module\Example\Http\Controllers";

    protected $apiPrefix = "/api/v1/";

    protected $defer = false;

    public function boot(): void
    {
        $this->registerConfig();
        $this->routes();
    }


    /**
     * @return void
     */
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php",
            "Example"
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
