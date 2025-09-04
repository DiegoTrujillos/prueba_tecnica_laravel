<?php

namespace App\Domain\Exceptions;

use RuntimeException;

class PokemonNotFoundException extends RuntimeException
{
    public function __construct(int $id)
    {
        parent::__construct('Pokemon not found.');
    }
}
