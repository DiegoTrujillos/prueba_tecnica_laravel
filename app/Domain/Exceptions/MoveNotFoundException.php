<?php

namespace App\Domain\Exceptions;

use RuntimeException;

class MoveNotFoundException extends RuntimeException
{
    public function __construct(string $moveName)
    {
        parent::__construct("Move '{$moveName}' not found.");
    }
}
