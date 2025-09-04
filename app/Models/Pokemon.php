<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function moves(): BelongsToMany
    {
        return $this->belongsToMany(Move::class, 'pokemon_move');
    }
}
