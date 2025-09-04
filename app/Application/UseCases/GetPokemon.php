<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\PokemonRepository;
use App\Domain\Exceptions\PokemonNotFoundException;
use App\Application\DTO\PokemonDTO;

class GetPokemon
{
    public function __construct(private PokemonRepository $pokemonRepository) {}

    public function __invoke(int $id): array
    {
        $pokemon = $this->pokemonRepository->findById($id);
        if (!$pokemon) {
            throw new PokemonNotFoundException($id);
        }
        return PokemonDTO::fromEntity($pokemon);
    }
}
