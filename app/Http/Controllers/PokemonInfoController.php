<?php

namespace App\Http\Controllers;

use App\Models\BannedPokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonInfoController extends Controller
{
    public function info(Request $request)
    {
        $request->validate([
            'pokemons' => ['required', 'array', 'min:1'],
            'pokemons.*' => ['required', 'string'],
        ]);

        $result = [];

        foreach ($request->pokemons as $pokemonName) {
            $pokemonName = strtolower($pokemonName);

            $isBanned = BannedPokemon::where('name', $pokemonName)->exists();

            if ($isBanned) {
                continue;
            }

            $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$pokemonName}");

            if ($response->failed()) {
                $result[] = [
                    'name' => $pokemonName,
                    'error' => 'Pokemon not found',
                ];

                continue;
            }

            $pokemon = $response->json();

            $result[] = [
                'name' => $pokemon['name'],
                'height' => $pokemon['height'],
                'weight' => $pokemon['weight'],
            ];
        }

        return response()->json([
            'data' => $result,
        ]);
    }
}
