<?php

declare(strict_types=1);

namespace Recruiter\Array;

class Range implements \Iterator
{
    private int $curr = 0;

    public function __construct(private readonly int $from, private readonly int $to)
    {
        $this->rewind();
    }

    public function rewind(): void
    {
        $this->curr = $this->from;
    }

    public function current(): int
    {
        return $this->curr;
    }

    public function key(): int
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
