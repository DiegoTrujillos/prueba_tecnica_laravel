<?php

namespace App\Domain\Entities;

use App\Domain\Exceptions\MoveAlreadyKnownException;
use App\Domain\Exceptions\MoveSetFullException;

class Pokemon
{
    private array $moves;

    public function __construct(
        private int $id,
        private string $name,
        array $moves = []
    ) {
        $this->moves = $moves;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function moves(): array
    {
        return $this->moves;
    }

    public function teach(Move $move): void
    {
        foreach ($this->moves as $m) {
            if (mb_strtolower($m->name()) === mb_strtolower($move->name())) {
                throw new MoveAlreadyKnownException($this->name, $move->name());
            }
        }
        if (count($this->moves) >= 4) {
            throw new MoveSetFullException($this->name);
        }
        $this->moves[] = $move;
    }
}
