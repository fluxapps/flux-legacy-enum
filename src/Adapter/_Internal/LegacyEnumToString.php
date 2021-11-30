<?php

namespace FluxLegacyEnum\Adapter\_Internal;

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
