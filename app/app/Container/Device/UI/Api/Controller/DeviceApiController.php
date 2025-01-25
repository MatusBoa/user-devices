<?php

declare(strict_types=1);

namespace App\Container\Device\UI\Api\Controller;

use App\Core\Http\Parent\ApiController;
use App\Core\Http\Parent\StreamedApiResponse;
use App\Container\Device\UI\Api\Transformer\DeviceApiTransformer;
use App\Container\Device\Contract\Database\DeviceRepositoryInterface;

final class DeviceApiController extends ApiController
{
    /**
     * @param \App\Container\Device\Contract\Database\DeviceRepositoryInterface $deviceRepository
     *
     * @return \App\Core\Http\Parent\StreamedApiResponse
     */
    public function index(DeviceRepositoryInterface $deviceRepository): StreamedApiResponse
    {
        return $this->iterableResponse(
            DeviceApiTransformer::class,
            $deviceRepository->getAll(),
        );
    }
}
