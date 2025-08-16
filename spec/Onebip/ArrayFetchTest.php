<?php

namespace Onebip;

use PHPUnit\Framework\TestCase;

class ArrayFetchTest extends TestCase
{
    private array $array;

    protected function setUp(): void
    {
        $this->array = [0, 1, 2, null, 'a' => 1, 'b' => null];
    }

    public function test_array_fetch(): void
    {
        $this->assertSame(0, array_fetch($this->array, 0));
        $this->assertSame(1, array_fetch($this->array, 'a'));
        $this->assertSame(null, array_fetch($this->array, 3));
        $this->assertSame(null, array_fetch($this->array, 'b'));
    }

    public function test_array_fetch_Fallback(): void
    {
        $this->assertSame('fallback', array_fetch($this->array, 4, 'fallback'));
        $this->assertSame('fallback', array_fetch($this->array, 'c', 'fallback'));
        $this->assertSame(null, array_fetch($this->array, 'c', null));
    }

    public function test_array_fetch_Closure(): void
    {
        $this->assertSame(
            4,
            array_fetch($this->array, 4, function ($i) { return $i; })
        );
        $this->assertSame(
            'c',
            array_fetch($this->array, 'c', function ($i) { return $i; })
        );
    }

    public function testError()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('key not found 4');
        $this->assertSame('fallback', array_fetch($this->array, '4'));
    }
}
