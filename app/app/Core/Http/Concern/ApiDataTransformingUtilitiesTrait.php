<?php

declare(strict_types=1);

namespace App\Core\Http\Concern;

trait ApiDataTransformingUtilitiesTrait
{
    /**
     * @param null|\DateTimeInterface $date
     *
     * @return ($date is null ? null : string)
     */
    protected function formatDateTime(?\DateTimeInterface $date): ?string
    {
        return $date?->format('Y-m-d H:i:s');
    }

    /**
     * @template TEnum of \BackedEnum
     *
     * @param null|TEnum $enum
     *
     * @return ($enum is null ? null : value-of<TEnum>)
     */
    protected function formatEnum(?\BackedEnum $enum): mixed
    {
        return $enum?->value;
    }
}
