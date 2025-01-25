<?php

declare(strict_types=1);

namespace App\Container\User\UI\Api\Request;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Factory;
use App\Container\Device\Database\Model\Device;
use App\Container\Device\Data\Enum\DeviceTypeEnum;
use App\Container\Device\Data\Enum\DeviceOperatingSystemEnum;

final readonly class UserDeviceRequestFilter
{
    /**
     * @param \Illuminate\Contracts\Validation\Factory $validatorFactory
     */
    public function __construct(
        private Factory $validatorFactory,
    ) {
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array<\App\Container\Device\Database\Model\Device::ATTR_*, mixed>
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getValidatedData(Request $request): array
    {
        $validator = $this->validatorFactory->make($request->all(), [
            Device::ATTR_HOSTNAME => ['required', 'string', 'max:255'],
            Device::ATTR_TYPE => ['required', Rule::enum(DeviceTypeEnum::class)],
            Device::ATTR_OPERATING_SYSTEM => ['required', Rule::enum(DeviceOperatingSystemEnum::class)],
        ]);

        return $validator->validated();
    }
}
