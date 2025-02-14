<?php

use App\Http\Controllers\PaisesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaisesController::class, 'index']);

Route::get('paises', [PaisesController::class, 'index'])->name('paises.index');
Route::get('paises/{codISO}', [PaisesController::class, 'show'])->name('paises.show');