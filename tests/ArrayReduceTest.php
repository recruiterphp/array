<?php

declare(strict_types=1);

namespace Recruiter\Array\Tests;

use PHPUnit\Framework\TestCase;

use function Recruiter\Array\array_reduce;

use Recruiter\Array\Range;

class ArrayReduceTest extends TestCase
{
    public function testArrayReduce(): void
    {
        $this->assertSame(
            45,
            array_reduce(
                [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                fn (int $acc, int $n): int => $acc + $n,
                0,
            ),
        );
    }

    public function testIterator(): void
    {
        $this->assertSame(
            45,
            array_reduce(
                new Range(0, 10),
                fn (int $acc, int $n): int => $acc + $n,
                0,
            ),
        );
    }
}
