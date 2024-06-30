<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderDate;
use App\Models\Facture;
use App\Models\Commande;

class StripeController extends Controller
{
    public function confirmationPage(Request $request)
    {
        $user = auth()->user();
        $items = \Cart::session(Auth::id())->getContent(); // Assuming you're using a package like darryldecode/cart
        $total = $items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('confirmation', [
            'user' => $user,
            'items' => $items,
            'total' => $total
        ]);
    }

    public function session(Request $request)
    {
        $address = $request->input('adresseLivraison');
        // Store the address in session temporarily
        session(['address' => $address]);

        if (null != $request->input('online')) {

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
                'success_url' => route('success', ['reglee' => 1]), // Set reglee to 1 for online payment
                'cancel_url' => route('cancel'),
            ]);

            return redirect()->away($checkoutSession->url);
        } else if (null != $request->input('cash')) {
            return redirect()->route('success', ['reglee' => 0]); // Set reglee to 0 for cash payment
        }
    }


    public function success(Request $request)
    {
        DB::beginTransaction();

        try {
            $client_id = Auth::id();
            $currentDate = now()->format('Y-m-d');

            // Create new order date
            $orderDate = OrderDate::create([
                'jjmmaaaa' => $currentDate,
            ]);
            $insertedDate = $orderDate->idDate;
            $address = session('address');
            $reglee = $request->input('reglee', 0); // Get reglee from request, default to 0

            // Create new facture
            $facture = Facture::create([
                'etat' => 'en attente',
                'adresseLivraison' => $address,
                'idDate' => $insertedDate,
                'idClient' => $client_id,
                'reglee' => $reglee,
            ]);

            // Retrieve cart items
            $cart = \Cart::session(Auth::id())->getContent();

            // Create order lines
            foreach ($cart as $item) {
                Commande::create([
                    'etat' => 'en attente',
                    'numeroFacture' => $facture->numeroFacture,
                    'idPlat' => $item->id,
                    'prixVente' => $item->price,
                    'quantite' => $item->quantity,
                ]);
            }

            // Commit transaction
            DB::commit();

            // Clear cart
            \Cart::session(Auth::id())->clear();

            // Clear session address
            session()->forget('address');

            return redirect()->route('cart')->with('success', 'Merci, Votre Ordre Sera servi le plus proche possible');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart')->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }


    public function cancel()
    {
        // Clear session address in case of cancellation
        session()->forget('address');
        return redirect()->route('cart')->with('error', 'Votre Payment n\'est pas complet');
    }
}
