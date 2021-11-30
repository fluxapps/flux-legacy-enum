<?php

namespace FluxLegacyEnum\Unit;

interface UnitEnum extends UnitEnumName
{

    /**
     * @return static[]
     */
    public static function cases() : array;
}
