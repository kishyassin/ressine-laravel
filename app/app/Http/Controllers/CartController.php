<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Cart;
use Storage;

class CartController extends Controller
{
    /**
     * Display the cart view.
     */
    public function cart()
    {
        $items = \Cart::session(Auth::id())->getContent();
        return view('cart', ['items' => $items]);
    }

    /**
     * Add a Plat to the cart.
     */
    public function addPlatToCart($idPlat)
    {
        $plat = Plat::with('images')->findOrFail($idPlat);

        // Get the first image's icon if it exists
        $imageIcon = $plat->images->first() ? $plat->images->first()->imageIcon : null;

        \Cart::session(Auth::id())->add(array(
            'id' => $idPlat,
            'name' => $plat->designationPlat,
            'price' => $plat->prixUnitaire,
            'quantity' => 1,
            'attributes' => array(
                'description' => $plat->descriptionPlat,
                'image' => Storage::url($imageIcon)
            ),
            'associatedModel' => $plat
        ));

        return redirect()->route('cart')->with('success', 'Plat ajouté à votre panier!');
    }

    /**
     * Update the quantity of a cart item.
     */
    public function updatePlatInCart(Request $request, $rowId)
    {
        \Cart::session(Auth::id())->update($rowId, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        if ($request->has('redirect_to_confirmation')) {
            return redirect()->route('confirmation')->with('success', 'votre Panier est mis a jour');
        }

        return redirect()->route('cart')->with('success', 'votre Panier est mis a jour');
    }

    /**
     * Remove an item from the cart.
     */
    public function removePlatFromCart(Request $request, $rowId)
    {
        \Cart::session(Auth::id())->remove($rowId);

        if ($request->has('redirect_to_confirmation')) {
            return redirect()->route('confirmation')->with('success', 'Le plat est retirer du panier');
        }

        return redirect()->route('cart')->with('success', 'Le plat est retirer du panier');
    }

    /**
     * Clear the cart.
     */
    public function clearCart()
    {
        \Cart::session(Auth::id())->clear();

        return redirect()->route('cart')->with('success', 'votre panier est maintenant vide');
    }
}
