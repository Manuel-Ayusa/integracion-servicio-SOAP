<?php

use App\Http\Controllers\PaisController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaisController::class, 'index']);

Route::get('paises', [PaisController::class, 'index'])->name('paises.index');
Route::get('paises/{codISO}', [PaisController::class, 'show'])->name('paises.show');