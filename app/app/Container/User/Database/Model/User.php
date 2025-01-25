<?php

declare(strict_types=1);

namespace App\Container\User\Database\Model;

use Illuminate\Support\Collection;
use App\Core\Database\Parent\Model;
use Database\Factories\UserFactory;
use App\Container\Device\Database\Model\Device;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Core\Database\Concern\Model\HasTimestampsTrait;
use App\Core\Database\Contract\Model\HasTimestampsInterface;
use App\Core\Database\Concern\Model\HasAutoIncrementedIdTrait;
use App\Core\Database\Contract\Model\HasAutoIncrementedIdInterface;

final class User extends Model implements HasAutoIncrementedIdInterface, HasTimestampsInterface
{
    /** @use \Illuminate\Database\Eloquent\Factories\HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasTimestampsTrait;
    use HasAutoIncrementedIdTrait;

    public const string ATTR_FIRSTNAME = 'firstname';
    public const string ATTR_LASTNAME = 'lastname';

    public const string RELATION_DEVICES = 'devices';

    /**
     * @inheritDoc
     */
    protected $fillable = [
        self::ATTR_FIRSTNAME,
        self::ATTR_LASTNAME,
    ];

    /**
     * @inheritDoc
     */
    protected function casts(): array
    {
        return [
            self::ATTR_FIRSTNAME => 'string',
            self::ATTR_LASTNAME => 'string',
        ];
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->getAttributeValue(self::ATTR_FIRSTNAME);
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->getAttributeValue(self::ATTR_LASTNAME);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Container\Device\Database\Model\Device, $this>
     */
    public function devices(): HasMany
    {
        return $this->hasMany(
            Device::class,
            Device::ATTR_USER_ID,
            self::ATTR_ID,
        );
    }

    /**
     * @return \Illuminate\Support\Collection<array-key, \App\Container\Device\Database\Model\Device>
     *
     * @uses self::devices()
     */
    public function getDevices(): Collection
    {
        return $this->getRelationValue(self::RELATION_DEVICES);
    }

    /**
     * @inheritDoc
     */
    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
