<?php

namespace FluxLegacyEnum\Adapter\Unit;

use FluxLegacyEnum\Adapter\_Internal\LegacyEnumCallStatic;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumToString;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumUtils;
use FluxLegacyEnum\Unit\UnitEnum;
use LogicException;

abstract class LegacyUnitEnum implements UnitEnum
{

    use LegacyEnumCallStatic;
    use LegacyEnumToString;

    private string $_name;


    private function __construct(
        /*public readonly*/ string $name
    ) {
        $this->_name = $name;
    }


    /**
     * @return static[]
     */
    public static final function cases() : array
    {
        return LegacyEnumUtils::cases(
            static::class,
            function (string $name) : static {
                return static::new(
                    $name
                );
            }
        );
    }


    private static function new(
        string $name
    ) : static {
        return new static(
            $name
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
