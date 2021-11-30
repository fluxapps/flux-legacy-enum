<?php

namespace FluxLegacyEnum\Enum;

use ReflectionClass;
use ValueError;

final class LegacyEnumUtils
{

    private static array $cases = [];


    public static final function cases(string $class, callable $constructor, bool $values = false, bool $integers = false) : array
    {
        $cases = static::$cases[$class] ?? null;

        if ($cases === null) {
            $cases = [];

            foreach (explode("\n", (new ReflectionClass($class))->getDocComment()) as $line) {
                $line = array_filter(array_map("trim", explode(" ", $line)), fn(string $line) : bool => $line !== "");

                if (array_shift($line) !== "*" || array_shift($line) !== "@method" || array_shift($line) !== "static" || array_shift($line) !== "static") {
                    continue;
                }

                if (empty($name = array_shift($line)) || !str_ends_with($name, "()") || empty($name = substr($name, 0, strlen($name) - 2))) {
                    continue;
                }

                $value = implode(" ", $line);

                if ($values) {
                    if ($value === "") {
                        throw new ValueError(
                            "Case " . $name . " of backed enum " . $class . " must have a value"
                        );
                    }

                    if ($integers) {
                        if (!is_numeric($value) || !is_int($value = intval($value))) {
                            throw new ValueError(
                                "Enum case type string does not match enum backing type int"
                            );
                        }
                    }

                    $case = $constructor(
                        $name,
                        $value
                    );
                } else {
                    if ($value !== "") {
                        throw new ValueError(
                            "Case " . $name . " of non-backed enum " . $class . " must not have a value"
                        );
                    }

                    $case = $constructor(
                        $name
                    );
                }

                $cases[] = $case;
            }

            static::$cases[$class] = $cases;
        }

        return $cases;
    }


    public static final function fromName(array $cases, string $name, string $class)/* : mixed*/
    {
        $case = static::tryFromName(
            $cases,
            $name
        );

        if ($case === null) {
            throw new ValueError(
                "Undefined method " . static::toString(
                    $class,
                    $name
                )
            );
        }

        return $case;
    }


    public static final function fromValue(array $cases, /*mixed*/ $value, string $class)/* : mixed*/
    {
        $case = static::tryFromValue(
            $cases,
            $value
        );

        if ($case === null) {
            throw new ValueError(
                json_encode($value) . " is not a valid backing value for enum " . json_encode($class)
            );
        }

        return $case;
    }


    public static final function toString(string $class, string $name) : string
    {
        return $class . "::" . $name . "()";
    }


    public static final function tryFromName(array $cases, string $name)/* : mixed*/
    {
        foreach ($cases as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }

        return null;
    }


    public static final function tryFromValue(array $cases, /*mixed*/ $value)/* : mixed*/
    {
        foreach ($cases as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }

        return null;
    }
}
