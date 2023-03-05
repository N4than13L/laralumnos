<?php

use App\Http\Controllers\CarrerasController;
use Illuminate\Support\Facades\Route;

// importando los controladores.
use App\Http\Controllers\AlumnosController;
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
    return view('home');
});

Route::resource('carreras', CarrerasController::class);
Route::resource('alumnos', AlumnosController::class);
