<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class MoveModel extends Model
{
    protected $table = 'moves';
    protected $fillable = ['name'];
    public $timestamps = false;
}
