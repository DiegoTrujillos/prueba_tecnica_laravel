<?php

namespace App\Application\DTO;

use App\Domain\Entities\Pokemon;

class PokemonDTO
{
    public static function fromEntity(Pokemon $pokemon): array
    {
        return [
            'id' => $pokemon->id(),
            'name' => $pokemon->name(),
            'moves' => array_map(fn($m) => $m->name(), $pokemon->moves()),
        ];
    }
}
