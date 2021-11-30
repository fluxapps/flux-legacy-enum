<?php

namespace FluxLegacyEnum\Enum\Backed;

use FluxLegacyEnum\Enum\LegacyEnumCallStatic;
use FluxLegacyEnum\Enum\LegacyEnumName;
use FluxLegacyEnum\Enum\LegacyEnumToString;
use FluxLegacyEnum\Enum\LegacyEnumUtils;
use JsonSerializable;
use LogicException;

/**
 * @property-read string $value
 */
abstract class LegacyStringBackedEnum implements JsonSerializable
{

    use LegacyEnumCallStatic;
    use LegacyEnumName;
    use LegacyEnumToString;

    private string $_value;


    private function __construct()
    {

    }


    /** @return static[] */
    public static final function cases() : array
    {
        return LegacyEnumUtils::cases(
            static::class,
            function (string $name, string $value)/* : static*/ : self {
                $case = new static();

                $case->_name = $name;
                $case->_value = $value;

                return $case;
            },
            true
        );
    }


    /** @return static */
    public static final function from(string $value)/* : static*/ : self
    {
        return LegacyEnumUtils::fromValue(
            static::cases(),
            $value,
            static::class
        );
    }


    /** @return ?static */
    public static final function tryFrom(string $value)/* : ?static*/ : ?self
    {
        return LegacyEnumUtils::tryFromValue(
            static::cases(),
            $value
        );
    }


    public final function __debugInfo() : ?array
    {
        return [
            "name"  => $this->name,
            "value" => $this->value
        ];
    }


    public final function __get(string $key) : string
    {
        switch ($key) {
            case "name":
                return $this->_name;

            case "value":
                return $this->_value;

            default:
                throw new LogicException("Can't get " . $key);
        }
    }


    public final function __set(string $key, /*mixed*/ $value) : void
    {
        throw new LogicException("Can't set");
    }


    public function jsonSerialize() : string
    {
        return $this->value;
    }


    private function __clone()
    {
        throw new LogicException("Can't clone");
    }
}
