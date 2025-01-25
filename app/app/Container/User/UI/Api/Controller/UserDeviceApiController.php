<?php

declare(strict_types=1);

namespace App\Container\User\UI\Api\Controller;

use Illuminate\Http\Request;
use App\Core\Http\Parent\ApiResponse;
use App\Core\Http\Parent\ApiController;
use App\Core\Http\Parent\StreamedApiResponse;
use App\Container\Device\Database\Model\Device;
use App\Container\User\UI\Api\Request\UserDeviceRequestFilter;
use App\Container\Device\UI\Api\Transformer\DeviceApiTransformer;
use App\Container\User\Contract\Database\UserRepositoryInterface;
use App\Container\Device\Contract\Database\DeviceRepositoryInterface;

final class UserDeviceApiController extends ApiController
{
    /**
     * @param positive-int $userId
     * @param \App\Container\User\Contract\Database\UserRepositoryInterface $userRepository
     *
     * @return \App\Core\Http\Parent\StreamedApiResponse
     */
    public function index(
        int $userId,
        UserRepositoryInterface $userRepository
    ): StreamedApiResponse {
        $user = $userRepository->get($userId);

        return $this->iterableResponse(
            DeviceApiTransformer::class,
            $userRepository->getDevicesForUser($user),
        );
    }

    /**
     * @param positive-int $userId
     * @param \Illuminate\Http\Request $request
     * @param \App\Container\User\Contract\Database\UserRepositoryInterface $userRepository
     * @param \App\Container\User\UI\Api\Request\UserDeviceRequestFilter $userDeviceRequestFilter
     * @param \App\Container\Device\Contract\Database\DeviceRepositoryInterface $deviceRepository
     *
     * @return \App\Core\Http\Parent\ApiResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(
        int $userId,
        Request $request,
        UserRepositoryInterface $userRepository,
        UserDeviceRequestFilter $userDeviceRequestFilter,
        DeviceRepositoryInterface $deviceRepository,
    ): ApiResponse {
        $user = $userRepository->get($userId);
        $data = $userDeviceRequestFilter->getValidatedData($request);

        $device = $deviceRepository->create([
            ...$data,
            Device::ATTR_USER_ID => $user->getId(),
        ]);

        return $this->modelResponse(
            DeviceApiTransformer::class,
            $device,
        )->setStatusCode(201);
    }
}
