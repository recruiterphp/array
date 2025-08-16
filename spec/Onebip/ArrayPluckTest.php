<?php

declare(strict_types=1);

namespace Onebip;

use PHPUnit\Framework\TestCase;

class ArrayPluckTest extends TestCase
{
    public function testArrayPluckColumn(): void
    {
        $this->assertSame(
            ['bar', 'bar'],
            array_pluck([['foo' => 'bar', 'bis' => 'ter'],
                ['foo' => 'bar', 'bis' => 'ter']],
                'foo'),
        );
    }

    public function testIterator(): void
    {
        $this->assertSame(
            ['bar', 'bar'],
            array_pluck(
                new \ArrayIterator([
                    ['foo' => 'bar', 'bis' => 'ter'],
                    ['foo' => 'bar', 'bis' => 'ter'],
                ]),
                'foo',
            ),
        );
    }

    public function testArrayPluckWithHoles(): void
    {
        $this->assertSame(
            ['bar', null, 'bar'],
            array_pluck([['foo' => 'bar', 'bis' => 'ter'],
                ['foz' => 'bar', 'bis' => 'ter'],
                ['foo' => 'bar', 'bis' => 'ter']],
                'foo'),
        );
    }

    public function testArrayPluckWithScalarValues(): void
    {
        $this->assertSame(
            ['bar', null, 'bar'],
            array_pluck([['foo' => 'bar', 'bis' => 'ter'],
                'a scalar value',
                ['foo' => 'bar', 'bis' => 'ter']],
                'foo'),
        );
    }
}
