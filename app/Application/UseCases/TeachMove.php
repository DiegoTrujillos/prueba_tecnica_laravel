<?php

namespace App\Application\UseCases;

use App\Domain\Services\MoveTeacher;
use App\Application\DTO\PokemonDTO;

class TeachMove
{
    public function __construct(private MoveTeacher $service) {}

    public function __invoke(int $pokemonId, string $moveName): array
    {
        $pokemon = $this->service->teach($pokemonId, $moveName);
        return PokemonDTO::fromEntity($pokemon);
    }
}
