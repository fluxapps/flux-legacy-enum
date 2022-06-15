<?php

namespace FluxLegacyEnum\Backed;

use FluxLegacyEnum\Unit\UnitEnum;

interface StringBackedEnum extends UnitEnum, StringBackedEnumValue
{

    public static function from(string $value) : static;


    public static function tryFrom(string $value) : ?static;
}
