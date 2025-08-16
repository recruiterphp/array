<?php

declare(strict_types=1);

namespace Recruiter\Array\Tests;

use PHPUnit\Framework\TestCase;

use function Recruiter\Array\array_get_in;

class ArrayGetInTest extends TestCase
{
    public function testArray(): void
    {
        $array = [
            [
                'foo' => [
                    [
                        'bar' => 42,
                    ],
                ],
            ],
        ];

        $this->assertSame(
            $array,
            array_get_in($array, []),
        );

        $this->assertSame(
            [
                'foo' => [
                    [
                        'bar' => 42,
                    ],
                ],
            ],
            array_get_in($array, [0]),
        );

        $this->assertNull(
            array_get_in($array, [0, 'foo', 0, 'ber']),
        );

        $this->assertSame(
            42,
            array_get_in($array, [0, 'foo', 0, 'bar']),
        );

        $this->assertSame(
            0,
            array_get_in($array, [0, 'foo', 0, 'ber'], 0),
        );

        $this->assertSame(
            0,
            array_get_in(
                ['a' => ['b' => '']], ['a', 'b', 'c'], 0),
        );
    }

    public function testIterator(): void
    {
        $iterator = new \ArrayIterator([
            'a' => 42,
            'b' => new \ArrayIterator(['c' => 43]),
        ]);

        $this->assertSame(42, array_get_in($iterator, ['a']));
        $this->assertSame(43, array_get_in($iterator, ['b', 'c']));
    }
}
