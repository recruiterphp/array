<?php

declare(strict_types=1);

namespace Onebip;

use PHPUnit\Framework\TestCase;

class ArrayFetchTest extends TestCase
{
    private array $array;

    protected function setUp(): void
    {
        $this->array = [0, 1, 2, null, 'a' => 1, 'b' => null];
    }

    public function testArrayFetch(): void
    {
        $this->assertSame(0, array_fetch($this->array, 0));
        $this->assertSame(1, array_fetch($this->array, 'a'));
        $this->assertSame(null, array_fetch($this->array, 3));
        $this->assertSame(null, array_fetch($this->array, 'b'));
    }

    public function testArrayFetchFallback(): void
    {
        $this->assertSame('fallback', array_fetch($this->array, 4, 'fallback'));
        $this->assertSame('fallback', array_fetch($this->array, 'c', 'fallback'));
        $this->assertSame(null, array_fetch($this->array, 'c', null));
    }

    public function testArrayFetchClosure(): void
    {
        $this->assertSame(
            4,
            array_fetch($this->array, 4, fn ($i) => $i),
        );
        $this->assertSame(
            'c',
            array_fetch($this->array, 'c', fn ($i) => $i),
        );
    }

    public function testError(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('key not found 4');
        $this->assertSame('fallback', array_fetch($this->array, '4'));
    }
}
