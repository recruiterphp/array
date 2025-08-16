<?php

declare(strict_types=1);

namespace Onebip;

use PHPUnit\Framework\TestCase;

class ArrayAsHierarchyTest extends TestCase
{
    public function testDottedNotationToHierarchical(): void
    {
        $this->assertSame([], array_as_hierarchy([]));
        $this->assertSame(
            ['key' => 'value'],
            array_as_hierarchy(['key' => 'value']),
        );
        $this->assertSame(
            [
                'key' => [
                    'sub1' => 'value1',
                    'sub2' => 'value2',
                    'sub3' => [
                        'sub4' => 'value3',
                    ],
                ],
                'answer' => 42,
            ],
            array_as_hierarchy([
                'key.sub1' => 'value1',
                'key.sub2' => 'value2',
                'key.sub3.sub4' => 'value3',
                'answer' => 42,
            ]),
        );
    }
}
