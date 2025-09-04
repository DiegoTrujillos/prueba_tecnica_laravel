<?php

namespace App\Domain\Exceptions;

use RuntimeException;

class MoveSetFullException extends RuntimeException
{
    public function __construct(string $pokemonName)
    {
        parent::__construct($pokemonName.' cannot learn more than 4 moves.');
    }
}
