<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Container\User\Database\Model\User;
use App\Container\Device\Database\Model\Device;
use App\Container\Device\Data\Enum\DeviceTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Container\Device\Data\Enum\DeviceOperatingSystemEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Container\Device\Database\Model\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * @inheritDoc
     */
    protected $model = Device::class;

    /**
     * @inheritDoc
     *
     * @return array<\App\Container\Device\Model\Device::ATTR_*, mixed>
     */
    public function definition(): array
    {
        return [
            Device::ATTR_USER_ID => User::factory(),
            Device::ATTR_HOSTNAME => $this->faker->domainName(),
            Device::ATTR_TYPE => $this->faker->randomElement(DeviceTypeEnum::cases()),
            Device::ATTR_OPERATING_SYSTEM => $this->faker->randomElement(DeviceOperatingSystemEnum::cases()),
        ];
    }

    /**
     * @param \App\Container\User\Database\Model\User $user
     *
     * @return self
     */
    public function withUser(User $user): self
    {
        return $this->state([
            Device::ATTR_USER_ID => $user->getId(),
        ]);
    }
}
