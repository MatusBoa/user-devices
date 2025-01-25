<?php

declare(strict_types=1);

namespace App\Core\Http\Parent;

use App\Core\Database\Parent\Model;

abstract class ApiController extends Controller
{
    /**
     * @template T
     *
     * @param class-string<\App\Core\Http\Contract\ApiTransformerInterface<T>> $transformer
     * @param iterable<array-key, T> $iterable
     *
     * @return \App\Core\Http\Parent\StreamedApiResponse
     */
    protected function iterableResponse(
        string $transformer,
        iterable $iterable,
    ): StreamedApiResponse {
        // @todo: This helper method may by refactored using some kind of custom ServiceContainer
        $transformerInstance = \resolve($transformer);

        return new StreamedApiResponse(
            $transformerInstance->transformIterable($iterable),
        );
    }

    /**
     * @template T of \App\Core\Database\Parent\Model
     *
     * @param class-string<\App\Core\Http\Contract\ApiTransformerInterface<T>> $transformer
     * @param T $model
     *
     * @return \App\Core\Http\Parent\ApiResponse
     */
    protected function modelResponse(
        string $transformer,
        Model $model,
    ): ApiResponse {
        // @todo: This helper method may by refactored using some kind of custom ServiceContainer
        $transformerInstance = \resolve($transformer);

        return new ApiResponse(
            $transformerInstance->transform($model),
        );
    }
}
