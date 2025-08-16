<?php

declare(strict_types=1);

namespace Onebip;

use PHPUnit\Framework\TestCase;

class ArraySomeTest extends TestCase
{
    public function testArraySome(): void
    {
        $this->assertTrue(
            array_some([1, 2, 3], fn ($value): bool => 0 === $value % 2),
        );
    }

    public function testIterator(): void
    {
        $this->assertTrue(
            array_some(
                new Range(1, 4),
                fn ($value): bool => 0 === $value % 2,
            ),
        );
    }
}
