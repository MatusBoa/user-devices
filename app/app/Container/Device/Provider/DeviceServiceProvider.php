<?php

declare(strict_types=1);

namespace App\Container\Device\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Container\Device\Database\Repository\DeviceRepository;
use App\Container\Device\Contract\Database\DeviceRepositoryInterface;

final class DeviceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @inheritDoc
     */
    #[\Override]
    public function register(): void
    {
        $this->app->bind(DeviceRepositoryInterface::class, DeviceRepository::class);
    }

    /**
     * @inheritDoc
     *
     * @return list<class-string>
     */
    #[\Override]
    public function provides(): array
    {
        return [
            DeviceRepositoryInterface::class,
        ];
    }
}
