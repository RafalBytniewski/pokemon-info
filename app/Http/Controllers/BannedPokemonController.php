<?php

namespace App\Http\Controllers;

use App\Models\BannedPokemon;
use Illuminate\Http\Request;

class BannedPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('banned', [
            'bannedPokemons' => BannedPokemon::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BannedPokemon::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('banned.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BannedPokemon $bannedPokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BannedPokemon $bannedPokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BannedPokemon $bannedPokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name)
    {
        BannedPokemon::where('name', $name)->delete();
        return redirect()->route('banned.index');
    }
}
