@extends('layouts.app')

@section('title', 'Listado de Pokémon Capturados')
@section('header', 'Listado de Pokémons Capturados')

@section('content')
<div class="container"> 

    <main class="container text-center pt-4 pb-4">
        <a href="{{ route('pokemons.create') }}" class="btn btn-primary d-inline-block">Agregar Pokémon</a>
    </main>

    @if ($pokemons->count())
        <div class="pokemon-list"> 
            @foreach ($pokemons as $pokemon)
                <div class="card mb-4 mx-auto" style="max-width: 300px;"> 
                    <div class="card-body">
                        <h5 class="card-title">{{ $pokemon->name }}</h5>
                        <p class="card-text">Fecha de captura: {{ $pokemon->created_at->format('d/m/Y') }}</p>
                        <p class="card-text">Dummy: 
                           <span class="{{ $pokemon->dummy ? 'text-success' : 'text-danger' }}">
                               {{ $pokemon->dummy ? 'No' : 'Si' }} 
                           </span> 
                        </p>
                        <p class="card-text">Objeto Equipado: 
                            @if ($pokemon->equippable_type)
                                {{ ucfirst($pokemon->equippedItem->getMorphClass()) }}
                            @else
                                No hay objeto equipado
                            @endif
                        </p>
                        <td>
                            <a href="{{ route('pokemons.show', $pokemon) }}">Ver detalles</a>
                        </td>
                    </div>
                </div>
            @endforeach
        </div>

        <nav class="mt-4 d-flex justify-content-center"> 
            {{ $pokemons->links('pagination::bootstrap-4') }}
        </nav>

    @else
        <p class="text-center">No hay Pokémon registrados aún.</p> 
    @endif

</div>
@endsection
