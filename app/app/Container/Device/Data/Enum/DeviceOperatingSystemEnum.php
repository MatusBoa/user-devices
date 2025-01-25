<?php

declare(strict_types=1);

namespace App\Container\Device\Data\Enum;

enum DeviceOperatingSystemEnum: int
{
    case WINDOWS = 1;
    case LINUX = 2;
    case MACOS = 3;
    case IOS = 4;
    case ANDROID = 5;
}
