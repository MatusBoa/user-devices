<?php

declare(strict_types=1);

namespace App\Container\User\Contract\Database;

use App\Container\User\Database\Model\User;
use App\Core\Database\Contract\RepositoryInterface;

/**
 * @extends \App\Core\Database\Contract\RepositoryInterface<\App\Container\User\Database\Model\User>
 */
interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * @inheritDoc
     *
     * @param positive-int $id
     *
     * @return \App\Container\User\Database\Model\User
     */
    public function get(mixed $id): User;

    /**
     * Returns all devices of the user.
     *
     * @param \App\Container\User\Database\Model\User $user
     *
     * @return iterable<array-key, \App\Container\Device\Database\Model\Device>
     */
    public function getDevicesForUser(User $user): iterable;

    /**
     * @inheritDoc
     *
     * @param array<\App\Container\User\Database\Model\User::ATTR_*, mixed> $attributes
     *
     * @return \App\Container\User\Database\Model\User
     */
    public function create(array $attributes): User;
}
