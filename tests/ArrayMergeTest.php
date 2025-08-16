<?php

declare(strict_types=1);

namespace Recruiter\Array\Tests;

use PHPUnit\Framework\TestCase;

use function Recruiter\Array\array_merge;

class ArrayMergeTest extends TestCase
{
    public function testMerge(): void
    {
        $this->assertSame(
            ['a' => [1, 2, 3, 4]],
            array_merge(['a' => [1, 2]], ['a' => [3, 4]]),
        );
    }

    public function testMergeEmpty(): void
    {
        $this->assertSame([], array_merge([], []));
    }

    public function testMergeNumericWillConcatInOrder(): void
    {
        $this->assertSame(
            [1, 2, 3, 4],
            array_merge([1, 2], [3, 4]),
        );
    }

    public function testMergeAssociativeWillOverride(): void
    {
        $this->assertSame(
            ['a' => 2],
            array_merge(['a' => 1], ['a' => 2]),
        );
    }

    public function testMergeDeplyRecursive(): void
    {
        $this->assertSame(
            ['a' => ['b' => null, 'c' => [1, 2, 3, 4]], 'b' => []],
            array_merge(['a' => ['b' => 2, 'c' => [1, 2]]], ['a' => ['b' => null, 'c' => [3, 4]], 'b' => []]),
        );
    }

    public function testMergeMultipleArrays(): void
    {
        $this->assertSame(
            [1, 2, 3, 4],
            array_merge([1], [2], [3], [4]),
        );
    }

    public function testMergeNotArrays(): void
    {
        $this->assertSame(
            [1, 2],
            array_merge(1, 2),
        );
    }
}
