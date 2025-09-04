<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Pokemon;
use App\Domain\Entities\Move;

interface PokemonRepository
{
    public function findById(int $id): ?Pokemon;
    public function saveMove(int $pokemonId, Move $move): void;
}
