<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContasDetalheController;
use Illuminate\Support\Facades\Route;

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
    return view('/auth/login');
});

Route::get('/dashboard', [ContaController::class, 'dashboard'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contas', [ContaController::class, 'index'])->name('contas.index');
Route::get('contas/{conta}/detalhes', [ContasDetalheController::class, 'index'])->name('contas_detalhes.index');
Route::get('contas/{conta}/detalhes/create', [ContasDetalheController::class, 'create'])->name('contas_detalhes.create');
Route::post('contas/{conta}/detalhes', [ContasDetalheController::class, 'store'])->name('contas_detalhes.store');
Route::get('contas/{conta}/detalhes/{detalhe}/edit', [ContasDetalheController::class, 'edit'])->name('contas_detalhes.edit');
Route::put('contas/{conta}/detalhes/{detalhe}', [ContasDetalheController::class, 'update'])->name('contas_detalhes.update');
Route::delete('contas/{conta}/detalhes/{detalhe}', [ContasDetalheController::class, 'destroy'])->name('contas_detalhes.destroy');


Route::resource('contas', ContaController::class)
    ->middleware('auth');

    Route::resource('clientes', ClienteController::class)
    ->middleware('auth');
require __DIR__.'/auth.php';
