<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Move;

interface MoveRepository
{
    public function findByName(string $name): ?Move;
}
