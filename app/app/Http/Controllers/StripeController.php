<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function confirmationPage(Request $request)
{
    $cartItems = \Cart::session(Auth::id())->getContent();
    $total = \Cart::session(Auth::id())->getTotal();
    $user = Auth::user();
    
    return view('confirmation', compact('cartItems', 'total', 'user'));
}
public function session(Request $request)
{
    $address = $request->input('address');
    $productItems = [];

    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    $cartItems = \Cart::session(Auth::id())->getContent();

    foreach ($cartItems as $item) {
        $product_name = $item->name;
        $total = $item->price;
        $quantity = $item->quantity;

        $unit_amount = $total * 100; // Convert to cents

        $productItems[] = [
            'price_data' => [
                'currency' => 'MAD',
                'product_data' => [
                    'name' => $product_name,
                ],
                'unit_amount' => $unit_amount,
            ],
            'quantity' => $quantity,
        ];
    }

    if (empty($productItems)) {
        return redirect()->back()->with('error', 'No items in the cart.');
    }

    $checkoutSession = \Stripe\Checkout\Session::create([
        'line_items' => $productItems,
        'mode' => 'payment',
        'allow_promotion_codes' => true,
        'metadata' => [
            'user_id' => auth()->id(),
            'address' => $address,
        ],
        'customer_email' => auth()->user()->email,
        'success_url' => route('success'),
        'cancel_url' => route('cancel'),
    ]);

    return redirect()->away($checkoutSession->url);
}


    public function success()
    {

        \Cart::session(Auth::id())->clear();
        return redirect()->route('cart')->with('success', 'Merci, Votre Ordre Sera servi le plus proche possible');

    }

    public function cancel()
    {
        return redirect()->route('cart')->with('success', 'Votre Payment n\'est pas complet');
    }
}
