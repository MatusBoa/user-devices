<?php

declare(strict_types=1);

namespace App\Container\Device\Contract\Database;

use App\Container\Device\Database\Model\Device;
use App\Core\Database\Contract\RepositoryInterface;

/**
 * @extends \App\Core\Database\Contract\RepositoryInterface<\App\Container\Device\Database\Model\Device>
 */
interface DeviceRepositoryInterface extends RepositoryInterface
{
    /**
     * @inheritDoc
     *
     * @param positive-int $id
     *
     * @return \App\Container\Device\Database\Model\Device
     */
    public function get(mixed $id): Device;

    /**
     * @inheritDoc
     *
     * @param array<\App\Container\Device\Database\Model\Device::ATTR_*, mixed> $attributes
     *
     * @return \App\Container\Device\Database\Model\Device
     */
    public function create(array $attributes): Device;
}
