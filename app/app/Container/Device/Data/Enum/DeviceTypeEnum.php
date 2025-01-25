<?php

declare(strict_types=1);

namespace App\Container\Device\Data\Enum;

enum DeviceTypeEnum: int
{
    case PC = 1;
    case LAPTOP = 2;
    case MOBILE = 3;
}
