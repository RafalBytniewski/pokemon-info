<?php

namespace App\Http\Controllers;

use App\Models\BannedPokemon;
use Illuminate\Http\Request;

class BannedPokemonController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => BannedPokemon::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        $pokemon = BannedPokemon::create([
            'name' => strtolower($request->input('name'))
        ]);

        return response()->json([
            'message' => 'Pokemon added to banned list',
            'data' => $pokemon
        ], 201);
    }

    public function destroy(string $name)
    {
        BannedPokemon::where('name', strtolower($name))->delete();

        return response()->json([
            'message' => 'Pokemon removed from banned list'
        ]);
    }
}
