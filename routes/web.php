<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\PokemonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('pokemons.index'); 
});

Route::get('/pokemons', [PokemonController::class, 'index'])->name('pokemons.index'); 
Route::get('pokemons/create', [PokemonController::class, 'create'])->name('pokemons.create');
Route::post('pokemons', [PokemonController::class, 'store'])->name('pokemons.store');
Route::get('/pokemons/{pokemon}', [PokemonController::class, 'show'])->name('pokemons.show');
Route::get('/pokemons/search', [PokemonController::class, 'search'])->name('pokemon.search');
Route::post('/pokemons/{pokemon}/equip', [PokemonController::class, 'equip'])->name('pokemons.equip');
