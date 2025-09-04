<?php

namespace App\Domain\Exceptions;

use RuntimeException;

class MoveAlreadyKnownException extends RuntimeException
{
    public function __construct(string $pokemonName, string $moveName)
    {
        parent::__construct($pokemonName.' already knows the move '.$moveName.'.');
    }
}
