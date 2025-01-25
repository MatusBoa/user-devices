<?php

declare(strict_types=1);

namespace App\Container\Device\Database\Repository;

use Illuminate\Database\Eloquent\Builder;
use App\Container\Device\Database\Model\Device;
use App\Container\Device\Contract\Database\DeviceRepositoryInterface;

final class DeviceRepository implements DeviceRepositoryInterface
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
    public function get(mixed $id): Device
    {
        return $this->query()
            ->whereKey($id)
            ->sole();
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Device
    {
        return $this->query()->create($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder<\App\Container\Device\Database\Model\Device>
     */
    private function query(): Builder
    {
        return Device::query();
    }
}
