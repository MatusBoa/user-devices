<?php

declare(strict_types=1);

namespace App\Container\User\Database\Repository;

use Illuminate\Database\Eloquent\Builder;
use App\Container\User\Database\Model\User;
use App\Container\User\Contract\Database\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getAll(): iterable
    {
        return $this->query()->cursor();
    }

    /**
     * @inheritDoc
     */
    public function get(mixed $id): User
    {
        return $this->query()
            ->whereKey($id)
            ->sole();
    }

    /**
     * @inheritDoc
     */
    public function getDevicesForUser(User $user): iterable
    {
        return $user->getDevices();
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): User
    {
        return $this->query()->create($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder<\App\Container\User\Database\Model\User>
     */
    private function query(): Builder
    {
        return User::query();
    }
}
