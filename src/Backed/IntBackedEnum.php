<?php

namespace FluxLegacyEnum\Backed;

use FluxLegacyEnum\Unit\UnitEnum;

interface IntBackedEnum extends UnitEnum, IntBackedEnumValue
{

    public static function from(int $value) : static;


    public static function tryFrom(int $value) : ?static;
}
