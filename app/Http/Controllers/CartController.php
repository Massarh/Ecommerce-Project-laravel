<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        // dd($cart);

        session()->put('cart', $cart);
        notify()->success('Product added to cart!');
        return redirect()->back();
    }

    public function showCart()
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        // dd($cart->items);
        return view('cart', compact('cart'));
    }

    public function updateCart(Request $request, Product $product)
    {
        $request->validate([ //156 in Cart page to update the qty must be least 1
            'qty' => 'required|numeric|min:1'
        ]);

        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id, $request->qty); // qty from FORM in cart.blade.php
        session()->put('cart', $cart);
        notify()->success('Cart updated!');
        return redirect()->back();
    }

    public function removeCart(Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id); // remove() function in Models [Cart]

        if ($cart->totalQuantity <= 0) {
            session()->forget('cart'); // remove from the session
        } else {
            session()->put('cart', $cart); 
        }
        notify()->success('Cart updated!');
        return redirect()->back();
    }
}
