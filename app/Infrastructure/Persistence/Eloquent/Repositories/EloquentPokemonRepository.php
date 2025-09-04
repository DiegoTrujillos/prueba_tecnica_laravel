<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domain\Repositories\PokemonRepository;
use App\Domain\Entities\Pokemon as DomainPokemon;
use App\Domain\Entities\Move as DomainMove;
use App\Infrastructure\Persistence\Eloquent\Models\PokemonModel;
use App\Infrastructure\Persistence\Eloquent\Models\MoveModel;

class EloquentPokemonRepository implements PokemonRepository
{
    public function findById(int $id): ?DomainPokemon
    {
        $model = PokemonModel::with('moves')->find($id);
        if (!$model) {
            return null;
        }
        $moves = $model->moves->map(fn($m) => new DomainMove($m->id, $m->name))->all();
        return new DomainPokemon($model->id, $model->name, $moves);
    }

    public function saveMove(int $pokemonId, DomainMove $move): void
    {
        $pokemon = PokemonModel::findOrFail($pokemonId);
        $moveModel = MoveModel::findOrFail($move->id());
        if (!$pokemon->moves()->where('move_id', $moveModel->id)->exists()) {
            $pokemon->moves()->attach($moveModel->id);
        }
    }
}
