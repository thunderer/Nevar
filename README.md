# Nevar

Nevar is a small utility to examine value of any variable and generate its description.

# Installation

This library is available as `thunderer/nevar` on Packagist.

# Usage

Call `Nevar::describe()` method that returns string with the description or `null` if its type can't be matched:

```php
use Thunder\Nevar\Nevar;

assert('negative integer', Nevar::describe(-12));
assert('callable string', Nevar::describe('strlen'));
assert('callable string', Nevar::describe('strlen'));
```

# Descriptions

For given variable types, `Nevar` is able to extract following information:

| Type    | Descriptions                                |
|---------|---------------------------------------------|
| array   | empty, indexed, associative, callable       |
| float   | zero, positive, negarive, infinite, invalid |
| integer | zero, positive, negative                    |
| string  | callable, numeric                           |
| boolean | true, false                                 |
| object  | class                                       |
| stream  | type                                        |

# Ideas

I'm open to any new description ideas - any issue or a Pull Request will be welcomed!
