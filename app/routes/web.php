<?php

use App\Http\Controllers\CheckOutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StripeController;
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




Route::get('/booking', [ReserverController::class, 'bookingPage'])->name('booking');

Route::get('/about',[AboutController::class,'index']);

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/welcome',function(){
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/confirmation', [StripeController::class, 'confirmationPage'])->name('confirmation');
Route::post('/confirm', [StripeController::class, 'session'])->name('confirm');

Route::middleware('auth')->group(function () {
    //profile actions
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
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

    Route::post('/checkout', [CheckoutController::class, 'confirmCheckout'])->name('checkout.confirm');

});


require __DIR__.'/auth.php';
