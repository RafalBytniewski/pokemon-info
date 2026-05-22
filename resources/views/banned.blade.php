<h2>Dodaj pokemona do listy zbanowanych</h2>
<form method="POST" action="{{ route('banned.store') }}">
    <label for="name">Nazwa pokemona</label>
    <input id="name" type="text" name="name" required>
    <button type="submit">Dodaj</button>
</form>

<h3>Lista zbanowanych pokemonów:</h3>
@if($bannedPokemons->isNotEmpty())
    @foreach ($bannedPokemons as $pokemon)
        <p>{{  $pokemon->name    }} 
            <form method="POST" action="{{ route('banned.destroy', $pokemon->name) }}">
            @method('DELETE') 
                <button type="submit">X</button>
            </form>
        </p>
    @endforeach
@else
    <p>Lista zbanowanych pokemonów jest pusta</p>
@endif