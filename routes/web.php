<?php

use App\Http\Controllers\FaturamentoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\VendaController;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
});

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/time', TimeController::class);

Route::resource('/funcionario', FuncionarioController::class);

Route::resource('/faturamento', FaturamentoController::class);

Route::resource('/produto', ProdutoController::class);

Route::resource('/venda', VendaController::class);
