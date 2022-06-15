<?php

namespace FluxLegacyEnum\Adapter\_Internal;

use LogicException;

trait LegacyEnumCallStatic
{

    public static final function __callStatic(string $key, array $arguments) : static
    {
        if (!empty($arguments)) {
            throw new LogicException("Can't call with arguments");
        }

        return LegacyEnumUtils::fromName(
            static::cases(),
            $key,
            static::class
        );
    }
}
