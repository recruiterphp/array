<?php

declare(strict_types=1);

namespace Onebip;

use PHPUnit\Framework\TestCase;

class ArrayConcatTest extends TestCase
{
    public function testConcat(): void
    {
        $this->assertSame(
            [1, 2, 3, 4],
            array_concat(1, [2, 3], [4]),
        );
    }

    public function testContactWithIterator(): void
    {
        $this->assertSame(
            [1, 2, 3, 4],
            array_concat(1, new \ArrayIterator([2, 3]), [4]),
        );
    }

    public function testConcatPreservesNestedArrays(): void
    {
        $this->assertSame(
            [1, 2, [3], 4],
            array_concat(1, [2, [3]], [4]),
        );
    }

    public function testConcatEmpty(): void
    {
        $this->assertSame([], array_concat([], [], []));
    }

    public function testConcatCastToArray(): void
    {
        $this->assertSame([1], array_concat([1]));
        $this->assertSame([1], array_concat(1));
    }
}
