<?php

declare(strict_types=1);

namespace App\Container\User\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Container\User\Database\Repository\UserRepository;
use App\Container\User\Contract\Database\UserRepositoryInterface;

final class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @inheritDoc
     */
    #[\Override]
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
            UserRepositoryInterface::class,
        ];
    }
}
