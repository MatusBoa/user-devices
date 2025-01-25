<?php

declare(strict_types=1);

namespace App\Core\Database\Contract;

use App\Core\Database\Parent\Model;

/**
 * @template TModel of \App\Core\Database\Parent\Model
 */
interface RepositoryInterface
{
    /**
     * @return iterable<array-key, TModel>
     */
    public function getAll(): iterable;

    /**
     * @param mixed $id
     *
     * @return TModel
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function get(mixed $id): Model;

    /**
     * @param array<string, mixed> $attributes
     *
     * @return \App\Core\Database\Parent\Model
     */
    public function create(array $attributes): Model;
}
