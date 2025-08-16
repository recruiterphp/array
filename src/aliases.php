<?php

declare(strict_types=1);

namespace Onebip;

use Recruiter\Array as R;

function array_reduce($array, callable $f, $acc): mixed
{
    return R\array_reduce($array, $f, $acc);
}

function array_concat(mixed ...$arguments): array
{
    return R\array_concat(...$arguments);
}

function array_merge(...$arrays): array
{
    return R\array_merge(...$arrays);
}

function array_map($array, ?callable $mapper = null, $preserveKeys = false): array
{
    return R\array_map($array, $mapper, $preserveKeys);
}

function array_pluck($arrays, $column): array
{
    return R\array_pluck($arrays, $column);
}

function array_flatten($array)
{
    return R\array_flatten($array);
}

function array_all(iterable $array, callable $predicate): bool
{
    return R\array_all($array, $predicate);
}

function array_some(iterable $array, callable $predicate): bool
{
    return R\array_some($array, $predicate);
}

function array_cartesian_product(array $arrays): array
{
    return R\array_cartesian_product($arrays);
}

function array_group_by($array, ?callable $f = null)
{
    return R\array_group_by($array, $f);
}

function array_as_hierarchy(array $array, $separator = '.'): array
{
    return R\array_as_hierarchy($array, $separator);
}

function is_numeric_array(array $array): bool
{
    return R\is_numeric_array($array);
}

function array_fetch(array $array, $key)
{
    // Handle optional third parameter
    if (func_num_args() >= 3) {
        return R\array_fetch($array, $key, func_get_arg(2));
    }

    return R\array_fetch($array, $key);
}

function array_update($array, $key, callable $f)
{
    return R\array_update($array, $key, $f);
}

function array_max($array)
{
    return R\array_max($array);
}

function array_get_in(mixed $array, array $path, mixed $default = null): mixed
{
    return R\array_get_in($array, $path, $default);
}

function array_subset(array $array1, array $array2): bool
{
    return R\array_subset($array1, $array2);
}
