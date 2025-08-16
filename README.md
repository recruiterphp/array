# RecruiterPHP Array

[![CI Pipeline](https://github.com/recruiterphp/array/actions/workflows/ci.yml/badge.svg)](https://github.com/recruiterphp/array/actions/workflows/ci.yml)
[![PHP Version](https://img.shields.io/badge/php-%5E8.4-blue)](https://www.php.net/)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

A comprehensive collection of functional array utilities for PHP that provides the array functions you wish were part of the standard library. This package offers a consistent, functional programming approach to array manipulation with support for both arrays and iterables.

## Installation

```bash
composer require recruiterphp/array
```

## Features

- **Functional programming style** - All functions follow functional programming principles
- **Iterable support** - Most functions work with both arrays and `Traversable` objects
- **Consistent API** - Predictable function signatures and behaviors
- **Zero dependencies** - Only requires PHP 8.4+
- **Well-tested** - Comprehensive test coverage with PHPUnit

## Available Functions

### Core Array Operations

#### `array_reduce($array, callable $f, $acc)`
Enhanced version of PHP's `array_reduce` that supports any traversable and preserves keys.

```php
use function Onebip\array_reduce;

$sum = array_reduce([1, 2, 3], fn($acc, $val) => $acc + $val, 0); // 6
```

#### `array_map($array, ?callable $mapper = null, $preserveKeys = false)`
Maps over arrays with optional key preservation and index access.

```php
use function Onebip\array_map;

$doubled = array_map([1, 2, 3], fn($n) => $n * 2); // [2, 4, 6]

// With key preservation
$result = array_map(['a' => 1, 'b' => 2], fn($v) => $v * 2, true);
// ['a' => 2, 'b' => 4]
```

#### `array_concat(...$elements)`
Concatenates arrays and scalar values into a single array.

```php
use function Onebip\array_concat;

$result = array_concat(1, [2, 3], [4, 5]); // [1, 2, 3, 4, 5]
```

#### `array_merge(...$arrays)`
Recursively merges arrays. Unlike PHP's `array_merge_recursive`, this keeps the second value when merging non-array values.

```php
use function Onebip\array_merge;

$merged = array_merge(
    ['a' => ['x' => 1]],
    ['a' => ['y' => 2]]
);
// ['a' => ['x' => 1, 'y' => 2]]
```

### Filtering and Testing

#### `array_all($array, callable $predicate)`
Returns true if all elements satisfy the predicate.

```php
use function Onebip\array_all;

$allEven = array_all([2, 4, 6], fn($n) => $n % 2 === 0); // true
```

#### `array_some($array, callable $predicate)`
Returns true if at least one element satisfies the predicate.

```php
use function Onebip\array_some;

$hasEven = array_some([1, 2, 3], fn($n) => $n % 2 === 0); // true
```

### Array Transformation

#### `array_flatten($array)`
Recursively flattens nested arrays.

```php
use function Onebip\array_flatten;

$flat = array_flatten([1, [2, [3, [4, 5]]]]); // [1, 2, 3, 4, 5]
```

#### `array_pluck($arrays, $column)`
Extracts a column from an array of arrays.

```php
use function Onebip\array_pluck;

$names = array_pluck([
    ['name' => 'Alice', 'age' => 30],
    ['name' => 'Bob', 'age' => 25]
], 'name');
// ['Alice', 'Bob']
```

#### `array_group_by($array, ?callable $f = null)`
Groups array elements by the result of a function.

```php
use function Onebip\array_group_by;

$grouped = array_group_by([1, 2, 3, 4, 5, 6], fn($n) => $n % 2);
// [1 => [1, 3, 5], 0 => [2, 4, 6]]
```

#### `array_cartesian_product(array $arrays)`
Returns the Cartesian product of multiple arrays.

```php
use function Onebip\array_cartesian_product;

$product = array_cartesian_product([[1, 2], ['a', 'b']]);
// [[1, 'a'], [1, 'b'], [2, 'a'], [2, 'b']]
```

### Array Access

#### `array_fetch(array $array, $key, $fallback = null)`
Safe array access with optional fallback.

```php
use function Onebip\array_fetch;

$value = array_fetch(['foo' => 'bar'], 'foo'); // 'bar'
$value = array_fetch([], 'missing', 'default'); // 'default'
$value = array_fetch([], 'key', fn($k) => "no $k"); // 'no key'
```

#### `array_get_in($array, array $path, $default = null)`
Access nested array values using a path of keys.

```php
use function Onebip\array_get_in;

$data = ['user' => ['name' => ['first' => 'John']]];
$firstName = array_get_in($data, ['user', 'name', 'first']); // 'John'
$missing = array_get_in($data, ['user', 'age'], 0); // 0
```

#### `array_update($array, $key, callable $f)`
Updates an array element if it exists and is not null.

```php
use function Onebip\array_update;

$updated = array_update(['count' => 5], 'count', fn($n) => $n + 1);
// ['count' => 6]
```

### Hierarchy and Structure

#### `array_as_hierarchy(array $array, $separator = '.')`
Transforms a flat array with dot-notation keys into a nested structure.

```php
use function Onebip\array_as_hierarchy;

$hierarchy = array_as_hierarchy([
    'user.name' => 'John',
    'user.email' => 'john@example.com',
    'settings.theme' => 'dark'
]);
// ['user' => ['name' => 'John', 'email' => 'john@example.com'],
//  'settings' => ['theme' => 'dark']]
```

### Utility Functions

#### `array_max($array)`
Returns the maximum value in an array, or null if empty.

```php
use function Onebip\array_max;

$max = array_max([3, 1, 4, 1, 5]); // 5
```

#### `array_subset(array $array1, array $array2)`
Checks if array1 is a subset of array2.

```php
use function Onebip\array_subset;

$isSubset = array_subset([1, 2], [1, 2, 3]); // true
```

#### `is_numeric_array(array $array)`
Checks if an array has only numeric keys.

```php
use function Onebip\is_numeric_array;

$numeric = is_numeric_array([1, 2, 3]); // true
$assoc = is_numeric_array(['a' => 1, 'b' => 2]); // false
```

## Range Iterator

The package includes a `Range` class for creating numeric ranges:

```php
use Onebip\Range;

$range = new Range(1, 5); // Iterates from 1 to 4
foreach ($range as $n) {
    echo $n; // 1, 2, 3, 4
}

// Works with array functions
$doubled = array_map(new Range(1, 4), fn($n) => $n * 2); // [2, 4, 6]
```

## Development

### Requirements

- PHP 8.4+
- Docker and Make for development environment

### Setup

```bash
git clone https://github.com/recruiterphp/array.git
cd array
make build
make install
```

### Running Tests

```bash
make test        # Run PHPUnit tests
make phpstan     # Run static analysis
make fix-cs      # Fix code style
make rector      # Run automated refactoring
```

### Development Commands

```bash
make up          # Start Docker containers
make down        # Stop Docker containers
make shell       # Open container shell
make clean       # Clean up containers and volumes
```

## Migration from onebip/onebip-array

This package replaces the legacy `onebip/onebip-array` package. To migrate:

1. Update your `composer.json`:
   ```json
   "require": {
     "recruiterphp/array": "^1.0"
   }
   ```

2. The namespace remains `Onebip` for backward compatibility
3. All functions maintain the same signatures

## Contributing

Contributions are welcome! Please ensure:

1. All tests pass (`make test`)
2. Static analysis passes (`make phpstan`)
3. Code style is fixed (`make fix-cs`)
4. New features include tests

## License

MIT License. See [LICENSE](LICENSE) for details.

## About RecruiterPHP

RecruiterPHP is a suite of battle-tested PHP packages for building robust, scalable applications. The array package is part of our toolkit that includes job queues, event sourcing, concurrency control, and more.

Visit [recruiterphp.org](https://recruiterphp.org) for more information about the full ecosystem.
