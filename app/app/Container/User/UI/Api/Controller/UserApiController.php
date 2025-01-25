<?php

declare(strict_types=1);

namespace App\Container\User\UI\Api\Controller;

use App\Core\Http\Parent\ApiResponse;
use App\Core\Http\Parent\ApiController;
use App\Core\Http\Parent\StreamedApiResponse;
use App\Container\User\UI\Api\Transformer\UserApiTransformer;
use App\Container\User\Contract\Database\UserRepositoryInterface;

final class UserApiController extends ApiController
{
    /**
     * @param \App\Container\User\Contract\Database\UserRepositoryInterface $userRepository
     *
     * @return \App\Core\Http\Parent\StreamedApiResponse
     */
    public function index(UserRepositoryInterface $userRepository): StreamedApiResponse
    {
        return $this->iterableResponse(
            UserApiTransformer::class,
            $userRepository->getAll(),
        );
    }

    /**
     * @param positive-int $id
     * @param \App\Container\User\Contract\Database\UserRepositoryInterface $userRepository
     *
     * @return \App\Core\Http\Parent\ApiResponse
     */
    public function show(
        int $id,
        UserRepositoryInterface $userRepository,
    ): ApiResponse {
        $user = $userRepository->get($id);

        return $this->modelResponse(
            UserApiTransformer::class,
            $user,
        );
    }
}
