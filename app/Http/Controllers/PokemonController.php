<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Berry;
use App\Models\Potion;
use App\Models\Item;
use App\Models\Pokedex;
use App\Models\User;
use Illuminate\Http\Request;

class PokemonController extends Controller
{

    public function index()
    {
        $pokemons = Pokemon::orderBy('created_at', 'desc')->paginate(4);
        return view('pokemons.index', compact('pokemons'));
    }

    public function create()
    {
        $users = User::all();
        $pokemons = Pokedex::where('captured', null)->get();
        return view('pokemons.create', compact('users','pokemons'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255', 
            'nickname' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
            'pokemon_id' => 'required|exists:pokedex,id', 
        ]);
    
        $pokemon = Pokedex::find($validatedData['pokemon_id']);
        $pokemon->captured = true; 
        $pokemon->save(); 
    
        $pokemonData = [
            'name' => $pokemon->name,
            'nickname' => $validatedData['nickname'],
            'user_id' => $validatedData['user_id'], 
            'dummy' => true, 
            'equippable_id' => null, 
            'equippable_type' => null, 
        ];
    
        $newPokemon = Pokemon::create($pokemonData);
    
        return redirect()->route('pokemons.index')->with('success', '¡Pokémon capturado agregado correctamente!');
    }
    

    public function search(Request $request)
    {
        $term = $request->get('term');

        $pokemons = Pokemon::where('name', 'like', '%'.$term.'%')->get();

        return response()->json([
            'pokemons' => $pokemons
        ]);
    }
    public function show(Pokemon $pokemon)
    {

        if($pokemon->equippable_type){
            $equippedItem = $pokemon->equippable_type === 'App\Models\Potion' ? 'potion' : 'berry';
        }else{
            $equippedItem = null;
        }
        
        return view('pokemons.show', compact('pokemon', 'equippedItem'));
    }
    
    

    /**
     * Equipa un objeto al Pokémon.
     *
     * @param  Request  $request
     * @param  Pokemon  $pokemon
     * @return \Illuminate\Http\RedirectResponse
     */
    public function equip(Request $request, Pokemon $pokemon)
    {
        // Acceder al tipo de objeto (berry o potion) desde la solicitud
        $itemType = $request->input('item_type');

        // Verificar si el tipo de objeto es una baya
        if ($itemType === 'berry') {
            // Obtener la primera baya disponible (puedes ajustar esto según tus necesidades)
            $berry = Berry::first();
    
            // Verificar si se encontró una baya
            if ($berry) {
                // Asociar la baya con el Pokémon
                $pokemon->equippedItem()->save($berry);
                $pokemon->equippable_type = Berry::class; // Establecer el tipo de objeto en Berry
                $pokemon->save();
    
                // Redireccionar con un mensaje de éxito
                return redirect()->route('pokemons.show', $pokemon)->with('success', '¡Baya equipada correctamente!');
            } else {
                // Redireccionar con un mensaje de error si no se encontró ninguna baya
                return back()->with('error', 'No se encontró ninguna baya disponible para equipar.');
            }
        } elseif ($itemType === 'potion') {

            // Obtener la primera poción disponible (puedes ajustar esto según tus necesidades)
            $potion = Potion::first();
    
            // Verificar si se encontró una poción
            if ($potion) {

                // Asociar la poción con el Pokémon
                $pokemon->equippedItem()->save($potion);
                $pokemon->equippable_type = Potion::class; // Establecer el tipo de objeto en Potion
                $pokemon->save();

                // Redireccionar con un mensaje de éxito
                return redirect()->route('pokemons.show', $pokemon)->with('success', '¡Poción equipada correctamente!');
            } else {
                // Redireccionar con un mensaje de error si no se encontró ninguna poción
                return back()->with('error', 'No se encontró ninguna poción disponible para equipar.');
            }
        } else {
            // Manejar otros tipos de objetos aquí (pociones u otros)
            return back()->with('error', 'Tipo de objeto no válido.');
        }
    }
    
}
