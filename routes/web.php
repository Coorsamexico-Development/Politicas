<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paginaController;
use App\Http\Controllers\finiquitoController;
use App\Http\Controllers\TipopoliticaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|cc
*/

Route::get('/', [paginaController::class, 'index'])->name('pagina.index');

Route::get('/lastPolicts', [paginaController::class, 'lastPolicts'])->name('pagina.lastPolicts');
Route::get('/politicCategories', [paginaController::class, 'politicCategories'])->name('pagina.politicCategories');
Route::get('/tipopoliticas/menu', [TipopoliticaController::class, 'index'])->name('pagina.tipopoliticas');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('politics', 'livewire.politics.index')->middleware('auth');
	Route::view('finiquitos', 'livewire.finiquitos.index')->middleware('auth');
	Route::view('tipopoliticas', 'livewire.tipopoliticas.index')->middleware('auth');