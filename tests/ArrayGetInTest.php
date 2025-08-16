<?php

declare(strict_types=1);

namespace Onebip;

use PHPUnit\Framework\TestCase;

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
}
