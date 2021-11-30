# flux-legacy-enum

PHP 8.1 like legacy enum

Experimental Alpha Version

## Installation

```dockerfile
COPY --from=docker-registry.fluxpublisher.ch/flux-enum/legacy:latest /flux-legacy-enum /%path%/libs/flux-legacy-enum
```

```php
require_once __DIR__ . "/%path%/libs/flux-legacy-enum/autoload.php";
```

## Examples

```php
/**
 * @method static static A()
 * @method static static B()
 * @method static static C()
 */
class Enum1 extends LegacyUnitEnum
{

}

Enum1::A()->name === "A";
Enum1::A() instanceof Enum1;
Enum1::A() === Enum1::A();

Enum1::cases();

try { Enum1::D(); } catch (Throwable $ex) { }
```

```php
/**
 * @method static static NAME_1() value_1
 * @method static static NAME_2() value_2
 * @method static static NAME_3() value_3
 */
class Enum2 extends LegacyStringBackedEnum
{

}

Enum2::NAME_1()->name === "NAME_1";
Enum2::NAME_1()->value === "value_1";
Enum2::NAME_1() instanceof Enum2;
Enum2::NAME_1() === Enum2::NAME_1();
json_encode(Enum2::NAME_1()) === '"value_1"';

Enum2::cases();

Enum2::tryFrom("value_2") === Enum2::NAME_2();
Enum2::tryFrom("xyz") === null;

Enum2::from("value_3") === Enum2::NAME_3();

try { Enum2::NAME_4(); } catch (Throwable $ex) { }
try { Enum2::from("xyz"); } catch (Throwable $ex) { }
```

```php
/**
 * @method static static ONE() 1
 * @method static static TWO() 2
 * @method static static THREE() 3
 */
class Enum3 extends LegacyIntBackedEnum
{

}

Enum3::ONE()->name === "ONE";
Enum3::ONE()->value === 1;
Enum3::ONE() instanceof Enum3;
Enum3::ONE() === Enum3::ONE();
json_encode(Enum3::ONE()) === '1';

Enum3::cases();

Enum3::tryFrom(2) === Enum3::TWO();
Enum3::tryFrom(4) === null;

Enum3::from(3) === Enum3::THREE();

try { Enum3::FOUR(); } catch (Throwable $ex) { }
try { Enum3::from(4); } catch (Throwable $ex) { }
```
