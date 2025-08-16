<?php

namespace Onebip;

use Iterator;

class Range implements Iterator
{
    private $from;
    private $to;
    private $curr;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;

        $this->rewind();
    }

    function rewind(): void
    { $this->curr = $this->from; }
    function current(): mixed
    { return $this->curr; }
    function key(): mixed
    { return $this->curr; }
    function next(): void
    { $this->curr++; }
    function valid(): bool
    { return $this->curr < $this->to; }
}
