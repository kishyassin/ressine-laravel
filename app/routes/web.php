<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\ReserverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
// Route::get('/', [PlatController::class, 'topThreePlats']);
Route::get('/', [IndexController::class, 'index']);

Route::get('/booking/{idPlat}', [ReserverController::class, 'bookingPage'])->name('booking');
