<?php

declare(strict_types=1);

namespace App\Container\Device\Database\Model;

use App\Core\Database\Parent\Model;
use Database\Factories\DeviceFactory;
use App\Container\Device\Data\Enum\DeviceTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Core\Database\Concern\Model\HasTimestampsTrait;
use App\Core\Database\Contract\Model\HasTimestampsInterface;
use App\Container\Device\Data\Enum\DeviceOperatingSystemEnum;
use App\Core\Database\Concern\Model\HasAutoIncrementedIdTrait;
use App\Core\Database\Contract\Model\HasAutoIncrementedIdInterface;

final class Device extends Model implements HasAutoIncrementedIdInterface, HasTimestampsInterface
{
    /** @use \Illuminate\Database\Eloquent\Factories\HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;
    use HasTimestampsTrait;
    use HasAutoIncrementedIdTrait;

    public const string ATTR_USER_ID = 'user_id';
    public const string ATTR_HOSTNAME = 'hostname';
    public const string ATTR_TYPE = 'type';
    public const string ATTR_OPERATING_SYSTEM = 'operating_system';

    /**
     * @inheritDoc
     */
    protected $fillable = [
        self::ATTR_USER_ID,
        self::ATTR_HOSTNAME,
        self::ATTR_TYPE,
        self::ATTR_OPERATING_SYSTEM,
    ];

    /**
     * @inheritDoc
     */
    protected function casts(): array
    {
        return [
            self::ATTR_USER_ID => 'integer',
            self::ATTR_HOSTNAME => 'string',
            self::ATTR_TYPE => DeviceTypeEnum::class,
            self::ATTR_OPERATING_SYSTEM => DeviceOperatingSystemEnum::class,
        ];
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->getAttributeValue(self::ATTR_USER_ID);
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->getAttributeValue(self::ATTR_HOSTNAME);
    }

    /**
     * @return \App\Container\Device\Data\Enum\DeviceTypeEnum
     */
    public function getType(): DeviceTypeEnum
    {
        return $this->getAttributeValue(self::ATTR_TYPE);
    }

    /**
     * @return \App\Container\Device\Data\Enum\DeviceOperatingSystemEnum
     */
    public function getOperatingSystem(): DeviceOperatingSystemEnum
    {
        return $this->getAttributeValue(self::ATTR_OPERATING_SYSTEM);
    }

    /**
     * @inheritDoc
     */
    protected static function newFactory(): DeviceFactory
    {
        return DeviceFactory::new();
    }
}
