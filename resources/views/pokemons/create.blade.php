@extends('layouts.app')

@section('title', 'Agregar Pokémon Capturado')
@section('header', 'Agregar un Pokémon capturado')

@section('content')
    <div class="container"> 
        <form action="{{ route('pokemons.store') }}" method="post">
            @csrf

            <select id="pokemon_select" name="pokemon_id" class="selectpicker" data-live-search="true">
                <option value="">-- Selecciona un Pokémon --</option>
                @foreach ($pokemons as $pokemon)
                    <option value="{{ $pokemon->id }}" data-tokens="{{ $pokemon->name }}">{{ $pokemon->name }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="nickname">Apodo:</label>
                <input type="text" name="nickname" id="nickname" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_id">Usuario:</label>
                <select name="user_id" id="user_id" class="form-select"> 
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <main class="container text-center pt-4 pb-4">
                <button type="submit" class="btn btn-primary">Agregar Pokémon</button>
            </main>

        </form>
    </div>
@endsection