<?php

declare(strict_types=1);

namespace Recruiter\Array\Tests;

use PHPUnit\Framework\TestCase;

use function Recruiter\Array\array_all;

use Recruiter\Array\Range;

class ArrayAllTest extends TestCase
{
    public function testArrayAll(): void
    {
        $multipleOfTwo = (fn ($n): bool => 0 === $n % 2);

        $this->assertTrue(array_all([], $multipleOfTwo));
        $this->assertTrue(array_all([2, 4, 6], $multipleOfTwo));
        $this->assertFalse(array_all([2, 4, 5], $multipleOfTwo));

        $lessThanTen = (fn ($n): bool => $n < 10);
        $this->assertTrue(array_all(new Range(0, 10), $lessThanTen));
        $this->assertFalse(array_all(new Range(0, 11), $lessThanTen));
    }
}
