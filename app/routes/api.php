<?php

declare(strict_types=1);

\Illuminate\Support\Facades\Route::apiResource('users', \App\Container\User\UI\Api\Controller\UserApiController::class)
    ->only(['index', 'show']);

\Illuminate\Support\Facades\Route::apiResource('users.devices', \App\Container\User\UI\Api\Controller\UserDeviceApiController::class)
    ->only(['index', 'store']);

\Illuminate\Support\Facades\Route::apiResource('devices', \App\Container\Device\UI\Api\Controller\DeviceApiController::class)
    ->only(['index']);
