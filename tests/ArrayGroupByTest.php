<?php

declare(strict_types=1);

namespace Recruiter\Array\Tests;

use PHPUnit\Framework\TestCase;

use function Recruiter\Array\array_group_by;

class ArrayGroupByTest extends TestCase
{
    public function testArrayGroupBy(): void
    {
        $this->assertSame([], array_group_by([]));
        $this->assertSame(
            [
                1 => [1],
                2 => [2, 2],
                3 => [3, 3],
                4 => [4],
            ],
            array_group_by([1, 2, 2, 3, 3, 4]),
        );
        $this->assertSame(
            [
                1 => [1, 3, 5],
                0 => [2, 4, 6],
            ],
            array_group_by(
                [1, 2, 3, 4, 5, 6],
                fn ($n): int => $n % 2,
            ),
        );
    }

    public function testIterator(): void
    {
        $this->assertSame(
            [
                1 => [1],
                2 => [2, 2],
                3 => [3, 3],
                4 => [4],
            ],
            array_group_by(new \ArrayIterator([1, 2, 2, 3, 3, 4])),
        );
    }
}
