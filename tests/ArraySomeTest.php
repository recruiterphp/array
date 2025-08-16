<?php

declare(strict_types=1);

namespace Recruiter\Array\Tests;

use PHPUnit\Framework\TestCase;

use function Recruiter\Array\array_some;

use Recruiter\Array\Range;

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
