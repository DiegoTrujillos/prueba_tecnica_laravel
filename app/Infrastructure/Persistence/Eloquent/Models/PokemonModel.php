<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PokemonModel extends Model
{
    protected $table = 'pokemon';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function moves(): BelongsToMany
    {
        return $this->belongsToMany(MoveModel::class, 'pokemon_move', 'pokemon_id', 'move_id');
    }
}
