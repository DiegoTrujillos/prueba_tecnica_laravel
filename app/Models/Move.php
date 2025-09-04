<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Move extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function pokemon(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_move');
    }
}
