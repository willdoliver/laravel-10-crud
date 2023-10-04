<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DentistaController;
use App\Http\Controllers\EspecialidadeController;
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

Route::get('/', [Controller::class,'index'])->name('home');

Route::get('/dentistas', [DentistaController::class,'index'])->name('dentistas.index');
Route::get('/dentistas/create', [DentistaController::class,'create'])->name('dentistas.create');
Route::post('/dentistas', [DentistaController::class,'store'])->name('dentistas.store');
Route::get('/dentistas/{dentista}', [DentistaController::class,'show'])->name('dentistas.show');
Route::get('/dentistas/{dentista}/edit', [DentistaController::class,'edit'])->name('dentistas.edit');
Route::put('/dentistas/{dentista}', [DentistaController::class,'update'])->name('dentistas.update');
Route::get('/dentista/{dentista}', [DentistaController::class,'delete'])->name('dentistas.delete');
Route::delete('/dentistas/{dentista}', [DentistaController::class,'destroy'])->name('dentistas.destroy');

Route::get('/especialidades', [EspecialidadeController::class,'index'])->name('especialidades.index');
Route::get('/especialidades/create', [EspecialidadeController::class,'create'])->name('especialidades.create');
Route::post('/especialidades', [EspecialidadeController::class,'store'])->name('especialidades.store');
// Route::get('/especialidades/{especialidade}', [EspecialidadeController::class,'show'])->name('especialidades.show');
Route::get('/especialidades/{especialidade}/edit', [EspecialidadeController::class,'edit'])->name('especialidades.edit');
Route::put('/especialidades/{especialidade}', [EspecialidadeController::class,'update'])->name('especialidades.update');
Route::get('/especialidade/{especialidade}', [EspecialidadeController::class,'delete'])->name('especialidades.delete');
Route::delete('/especialidades/{especialidade}', [EspecialidadeController::class,'destroy'])->name('especialidades.destroy');