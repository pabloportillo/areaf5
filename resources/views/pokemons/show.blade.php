@extends('layouts.app')

@section('title', 'Detalles de Pokémon')

@section('header', 'Detalles de Pokémon')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre: {{ $pokemon->name }}</h5>
            <p class="card-text">Apodo: {{ $pokemon->nickname }}</p>
            <p class="card-text">ID de Usuario: {{ $pokemon->user_id }}</p>
            
            @if ($equippedItem)
                <p class="card-text">Objeto Equipado: {{ $equippedItem }}</p>
            @else
                <p class="card-text">No hay ningún objeto equipado.</p>
            @endif

        </div>
    </div>

    <form action="{{ route('pokemons.equip', $pokemon) }}" method="post" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="item_type" class="form-label">Tipo de Objeto</label>
            <select name="item_type" id="item_type" class="form-select">
                <option value="berry">Baya</option>
                <option value="potion">Poción</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Equipar</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('pokemons.index') }}" class="btn btn-secondary">Volver</a>
    </div>

@endsection
