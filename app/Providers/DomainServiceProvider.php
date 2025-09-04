<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\PokemonRepository;
use App\Domain\Repositories\MoveRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\EloquentPokemonRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\EloquentMoveRepository;

class DomainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PokemonRepository::class, EloquentPokemonRepository::class);
        $this->app->bind(MoveRepository::class, EloquentMoveRepository::class);
    }

    public function boot(): void
    {
    }
}
