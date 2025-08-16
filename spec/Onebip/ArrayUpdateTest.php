<?php

declare(strict_types=1);

namespace Onebip;

use PHPUnit\Framework\TestCase;

class ArrayUpdateTest extends TestCase
{
    private array $array;

    protected function setUp(): void
    {
        $this->array = [0, 1, 2, null, 'a' => 1, 'b' => null];
    }

    public function testArrayUpdatePresent(): void
    {
        $array = array_update($this->array, 0, fn ($v): int|float => $v + 1);
        $this->assertSame(1, $array[0]);

        $array = array_update($this->array, 'a', fn ($v): int|float => $v + 1);
        $this->assertSame(2, $array['a']);
    }

    public function testArrayUpdateMissing(): void
    {
        $array = array_update($this->array, 42, fn ($v): int|float => $v + 1);
        $this->assertSame($this->array, $array);

        $array = array_update($this->array, 3, fn ($v): int|float => $v + 1);
        $this->assertSame($this->array, $array);
    }
}
