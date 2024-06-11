<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ReserverController;

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


// Route::get('/signupRestaurant', [IndexController::class, 'signupRestaurant']);


Route::middleware(['auth'])->group(function () {
    Route::get('/ordering/{idPlat}', [CommandeController::class, 'create'])->name('order.create');
    Route::post('/ordering', [CommandeController::class, 'store'])->name('order.store');
});

Route::get('/booking', [ReserverController::class, 'bookingPage'])->name('booking');

Route::get('/welcome',function(){
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
