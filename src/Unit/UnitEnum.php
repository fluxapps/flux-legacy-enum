<?php

namespace FluxLegacyEnum\Unit;

/**
 * @property-read string $name
 */
interface UnitEnum
{

    /**
     * @return static[]
     */
    public static function cases() : array;
}
