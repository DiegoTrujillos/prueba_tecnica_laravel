<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PokemonRepository;
use App\Domain\Repositories\MoveRepository;
use App\Domain\Exceptions\PokemonNotFoundException;
use App\Domain\Exceptions\MoveNotFoundException;

class MoveTeacher
{
    public function __construct(
        private PokemonRepository $pokemonRepository,
        private MoveRepository $moveRepository
    ) {}

    public function teach(int $pokemonId, string $moveName)
    {
        $pokemon = $this->pokemonRepository->findById($pokemonId);
        if (!$pokemon) {
            throw new PokemonNotFoundException($pokemonId);
        }
        $move = $this->moveRepository->findByName($moveName);
        if (!$move) {
            throw new MoveNotFoundException($moveName);
        }
        $pokemon->teach($move);
        $this->pokemonRepository->saveMove($pokemon->id(), $move);
        return $pokemon;
    }
}
