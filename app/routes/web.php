<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EtoileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
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


Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/booking',function(){
    return view('booking');
});
Route::get('/app',function(){
    return redirect('/app/commandes');
});


Route::get('/about',[AboutController::class,'index']);

Route::get('/contact',function(){
    return view('contact');
});



Route::get('/plat/details/{idPlat}', [PlatController::class, 'details'])->name('plat.details');
Route::post('/plat/rate/{idPlat}', [EtoileController::class, 'rate'])->name('plat.rate')->middleware('auth');

Route::post('/confirmation', [StripeController::class, 'confirmationPage'])->name('confirmation');
Route::post('/confirm', [StripeController::class, 'session'])->name('confirm');

Route::middleware('auth')->group(function () {
    //profile actions
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/addToCart/{idPlat}', [CartController::class, 'addPlatToCart'])->name('cart.add');
    Route::patch('/cart/update/{rowId}', [CartController::class, 'updatePlatInCart'])->name('cart.update');
    Route::delete('/cart/remove/{rowId}', [CartController::class, 'removePlatFromCart'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

    Route::post('stripe/session', [StripeController::class, 'session'])->name('stripe.session');
    Route::get('stripe/success', [StripeController::class, 'success'])->name('success');
    Route::get('stripe/cancel', [StripeController::class, 'cancel'])->name('cancel');

});

Route::get('livreur/login',[LivreurController::class,'showLogin'])->name('livreur/login');
Route::post('livreur/login',[LivreurController::class,'login'])->name('livreur/login');

Route::get('chef/login',[ChefController::class,'showLogin'])->name('chef/login');
Route::post('chef/login',[ChefController::class,'login'])->name('chef/login');

require __DIR__.'/auth.php';
