<?php

declare(strict_types=1);

namespace Recruiter\Array\Tests;

use PHPUnit\Framework\TestCase;

use function Recruiter\Array\array_subset;

class ArraySubsetTest extends TestCase
{
    public function testArraySubset(): void
    {
        $this->assertTrue(array_subset([], []));
        $this->assertTrue(array_subset([], [1]));
        $this->assertTrue(array_subset([1, 2, 3], [1, 2, 3, 4, 5]));

        $this->assertFalse(array_subset([1], []));
        $this->assertFalse(array_subset([1, 2, 3, 6], [1, 2, 3, 4, 5]));
    }
}
