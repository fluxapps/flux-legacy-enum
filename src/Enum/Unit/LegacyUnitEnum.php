<?php

namespace FluxLegacyEnum\Enum\Unit;

use FluxLegacyEnum\Enum\LegacyEnumCallStatic;
use FluxLegacyEnum\Enum\LegacyEnumName;
use FluxLegacyEnum\Enum\LegacyEnumToString;
use FluxLegacyEnum\Enum\LegacyEnumUtils;
use LogicException;

abstract class LegacyUnitEnum
{

    use LegacyEnumCallStatic;
    use LegacyEnumName;
    use LegacyEnumToString;

    private function __construct()
    {

    }


    /** @return static[] */
    public static final function cases() : array
    {
        return LegacyEnumUtils::cases(
            static::class,
            function (string $name)/* : static*/ : self {
                $case = new static();

                $case->_name = $name;

                return $case;
            }
        );
    }


    public final function __debugInfo() : ?array
    {
        return [
            "name" => $this->name
        ];
    }


    public final function __get(string $key) : string
    {
        switch ($key) {
            case "name":
                return $this->_name;

            default:
                throw new LogicException("Can't get " . $key);
        }
    }


    public final function __set(string $key, /*mixed*/ $value) : void
    {
        throw new LogicException("Can't set");
    }


    private function __clone()
    {
        throw new LogicException("Can't clone");
    }
}
