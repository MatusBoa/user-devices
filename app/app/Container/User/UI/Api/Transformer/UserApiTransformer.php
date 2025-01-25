<?php

declare(strict_types=1);

namespace App\Container\User\UI\Api\Transformer;

use App\Core\Http\Parent\ApiTransformer;
use App\Container\User\Database\Model\User;
use App\Core\Http\Concern\ApiDataTransformingUtilitiesTrait;

/**
 * @extends \App\Core\Http\Parent\ApiTransformer<\App\Container\User\Database\Model\User>
 */
final class UserApiTransformer extends ApiTransformer
{
    use ApiDataTransformingUtilitiesTrait;

    /**
     * @inheritDoc
     */
    public function transform(mixed $item): array
    {
        return [
            User::ATTR_ID => $item->getId(),
            User::ATTR_FIRSTNAME => $item->getFirstname(),
            User::ATTR_LASTNAME => $item->getLastname(),
            User::ATTR_CREATED_AT => $this->formatDateTime($item->getCreatedAt()),
            User::ATTR_UPDATED_AT => $this->formatDateTime($item->getUpdatedAt()),
        ];
    }
}
