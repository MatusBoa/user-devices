<?php

declare(strict_types=1);

namespace App\Core\Database\Concern\Model;

use App\Core\Database\Contract\Model\HasAutoIncrementedIdInterface;

trait HasAutoIncrementedIdTrait
{
    /**
     * Laravel's magic method that initializes this trait
     *
     * @see https://medium.com/swlh/laravel-booting-and-initializing-models-with-traits-2f77059b1915
     */
    public function initializeHasAutoIncrementedIdTrait(): void
    {
        $this->casts = [
            HasAutoIncrementedIdInterface::ATTR_ID => 'int',
            ...$this->casts(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->getAttributeValue(HasAutoIncrementedIdInterface::ATTR_ID);
    }
}
