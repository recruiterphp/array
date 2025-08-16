<?php

declare(strict_types=1);

namespace Onebip;

use PHPUnit\Framework\TestCase;

class ArrayMapTest extends TestCase
{
    public function testMap(): void
    {
        $this->assertSame(
            [2, 4, 6],
            array_map([1, 2, 3], fn ($value): int|float => $value * 2),
        );
    }

    public function testIterator(): void
    {
        $this->assertSame(
            [2, 4, 6],
            array_map(new Range(1, 4), fn ($value): int|float => $value * 2),
        );
    }

    public function testIdentity(): void
    {
        $this->assertSame([], array_map([]));
        $this->assertSame([1, 2, 3], array_map([1, 2, 3]));
    }

    public function testIdentityPreservingKeys(): void
    {
        $array = ['1' => 1, '2' => 2, '3' => 3];
        $this->assertSame($array, array_map($array, null, true));
        $this->assertNotSame($array, array_map($array, null, false));
    }

    public function testIndexesAreLost(): void
    {
        $this->assertSame([1, 2, 3], array_map(['1' => 1, '2' => 2, '3' => 3]));
    }

    public function testIndexesArePassedAsParameters(): void
    {
        $returnKeys = (fn ($value, $key) => $key);
        $this->assertSame(
            ['one', 'two', 'three'],
            array_map(['one' => 1, 'two' => 2, 'three' => 3], $returnKeys),
        );
    }
}
