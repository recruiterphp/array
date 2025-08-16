<?php

namespace Onebip;

class ArrayFindTest extends \PHPUnit\Framework\TestCase
{
    public function testArrayFind()
    {
        $this->assertSame(
            2,
            array_find(
                [1, 2, 3, 4],
                function ($n) { return $n % 2 === 0; }
            )
        );

        $this->assertNull(
            array_find(
                [1, 2, 3, 4],
                function ($n) { return $n > 5; }
            )
        );
    }
}
