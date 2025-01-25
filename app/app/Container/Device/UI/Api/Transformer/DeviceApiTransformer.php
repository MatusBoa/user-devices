<?php

declare(strict_types=1);

namespace App\Container\Device\UI\Api\Transformer;

use App\Core\Http\Parent\ApiTransformer;
use App\Container\Device\Database\Model\Device;
use App\Core\Http\Concern\ApiDataTransformingUtilitiesTrait;

/**
 * @extends \App\Core\Http\Parent\ApiTransformer<\App\Container\Device\Database\Model\Device>
 */
final class DeviceApiTransformer extends ApiTransformer
{
    use ApiDataTransformingUtilitiesTrait;

    /**
     * @inheritDoc
     */
    public function transform(mixed $item): array
    {
        return [
            Device::ATTR_ID => $item->getId(),
            Device::ATTR_HOSTNAME => $item->getHostname(),
            Device::ATTR_TYPE => $this->formatEnum($item->getType()),
            Device::ATTR_OPERATING_SYSTEM => $this->formatEnum($item->getOperatingSystem()),
            Device::ATTR_CREATED_AT => $this->formatDateTime($item->getCreatedAt()),
            Device::ATTR_UPDATED_AT => $this->formatDateTime($item->getUpdatedAt()),
        ];
    }
}
