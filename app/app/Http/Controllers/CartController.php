<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Cart;

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
        $plat = Plat::findOrFail($idPlat);

        \Cart::session(Auth::id())->add(array(
            'id' => $idPlat,
            'name' => $plat->designationPlat,
            'price' => $plat->prixUnitaire,
            'quantity' => 1,
            'attributes' => array(
                'description' => $plat->descriptionPlat
            ),
            'associatedModel' => $plat
        ));

        return redirect()->route('cart')->with('success', 'Plat added to cart!');
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

        return redirect()->route('cart')->with('success', 'Cart updated!');
    }

    /**
     * Remove an item from the cart.
     */
    public function removePlatFromCart($rowId)
    {
        \Cart::session(Auth::id())->remove($rowId);

        return redirect()->route('cart')->with('success', 'Plat removed from cart!');
    }

    /**
     * Clear the cart.
     */
    public function clearCart()
    {
        \Cart::session(Auth::id())->clear();

        return redirect()->route('cart')->with('success', 'Cart cleared!');
    }
}
