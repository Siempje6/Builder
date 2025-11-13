<?php

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

Route::view('/', 'index')->name('index');


use App\Http\Controllers\KlantController;

// ---------------------------------------------------------
// Routes voor klantenbeheer
// ---------------------------------------------------------

Route::get('/klanten', [KlantController::class, 'index'])->name('klanten.index');

Route::get('/klanten/{id}', [KlantController::class, 'show'])->name('klanten.show');

Route::get('/klanten/create', [KlantController::class, 'create'])->name('klanten.create');
Route::post('/klanten', [KlantController::class, 'store'])->name('klanten.store');

Route::get('/klanten/{id}/edit', [KlantController::class, 'edit'])->name('klanten.edit');
Route::put('/klanten/{id}', [KlantController::class, 'update'])->name('klanten.update');

Route::delete('/klanten/{id}', [KlantController::class, 'destroy'])->name('klanten.destroy');
