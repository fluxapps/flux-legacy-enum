<?php

namespace FluxLegacyEnum\Enum;

trait LegacyEnumToString
{

    public final function __toString() : string
    {
        return LegacyEnumUtils::toString(
            static::class,
            $this->name
        );
    }
}
