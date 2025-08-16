<?php

declare(strict_types=1);

namespace Onebip;

class Range implements \Iterator
{
    private $curr;

    public function __construct(private $from, private $to)
    {
        $this->rewind();
    }

    public function rewind(): void
    {
        $this->curr = $this->from;
    }

    public function current(): mixed
    {
        return $this->curr;
    }

    public function key(): mixed
    {
        return $this->curr;
    }

    public function next(): void
    {
        ++$this->curr;
    }

    public function valid(): bool
    {
        return $this->curr < $this->to;
    }
}
