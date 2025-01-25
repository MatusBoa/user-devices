<?php

declare(strict_types=1);

namespace App\Core\Application\Provider;

use Carbon\CarbonImmutable;
use Illuminate\Support\DateFactory;
use Illuminate\Support\ServiceProvider;
use App\Container\User\Provider\UserServiceProvider;
use App\Container\Device\Provider\DeviceServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[\Override]
    public function register(): void
    {
        $this->app->registerDeferredProvider(UserServiceProvider::class);
        $this->app->registerDeferredProvider(DeviceServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DateFactory::use(CarbonImmutable::class);
    }
}
