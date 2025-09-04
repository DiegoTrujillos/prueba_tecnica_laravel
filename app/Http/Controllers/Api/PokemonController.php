<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application\UseCases\GetPokemon;
use App\Application\UseCases\TeachMove;
use App\Domain\Exceptions\PokemonNotFoundException;
use App\Domain\Exceptions\MoveNotFoundException;
use App\Domain\Exceptions\MoveSetFullException;
use App\Domain\Exceptions\MoveAlreadyKnownException;
use Symfony\Component\HttpFoundation\Response;

class PokemonController extends Controller
{
    public function show(int $pokemonId, GetPokemon $useCase)
    {
        try {
            $data = $useCase($pokemonId);
            return response()->json($data, Response::HTTP_OK);
        } catch (PokemonNotFoundException $e) {
            return response()->json(['error' => 'Pokemon not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function teachMove(int $pokemonId, Request $request, TeachMove $useCase)
    {
        $moveName = $request->input('move_name');
        if (!$moveName || !is_string($moveName) || trim($moveName) === '') {
            return response()->json(['error' => 'The {move_name} field is required.'], Response::HTTP_BAD_REQUEST);
        }
        try {
            $data = $useCase($pokemonId, $moveName);
            return response()->json($data, Response::HTTP_OK);
        } catch (PokemonNotFoundException $e) {
            return response()->json(['error' => 'Pokemon not found.'], Response::HTTP_NOT_FOUND);
        } catch (MoveNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        } catch (MoveAlreadyKnownException $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (MoveSetFullException $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
