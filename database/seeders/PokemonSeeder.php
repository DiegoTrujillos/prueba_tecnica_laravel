<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pokemon;
use App\Models\Move;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pokemon_move')->delete();
        DB::table('pokemon')->delete();
        DB::table('moves')->delete();

        $moves = [
            ['name' => 'Scratch'],
            ['name' => 'Growl'],
            ['name' => 'Ember'],
            ['name' => 'Tackle'],
            ['name' => 'Tail Whip'],
            ['name' => 'Water Gun'],
            ['name' => 'Bubble'],
            ['name' => 'Flamethrower'],
            ['name' => 'Hydro Pump'],
            ['name' => 'Dragon Rage'],
            ['name' => 'Slash'],
            ['name' => 'Bite'],
        ];

        $moveModels = [];
        foreach ($moves as $moveData) {
            $moveModels[$moveData['name']] = Move::create($moveData);
        }

        $charmander = Pokemon::create(['name' => 'Charmander']);
        $squirtle = Pokemon::create(['name' => 'Squirtle']);

        $charmander->moves()->attach([
            $moveModels['Scratch']->id,
            $moveModels['Growl']->id,
            $moveModels['Ember']->id,
        ]);

        $squirtle->moves()->attach([
            $moveModels['Tackle']->id,
            $moveModels['Tail Whip']->id,
            $moveModels['Water Gun']->id,
            $moveModels['Bubble']->id,
        ]);
    }
}
