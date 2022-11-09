<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

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


    public function checkout($amount)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        return view('checkout', compact('amount', 'cart'));
    }

    public function charge(Request $request)
    {
        //return $request->stripeToken; // RETURN -> tok_1M28ryDRUJBpF05ylfYIkU6S
        $charge = Stripe::charges()->create([
            'currency' => "USD",
            'source' => $request->stripeToken,
            'amount' => $request->amount, // from <input name="amount" ...> in checkout.blade.php 
            'description' => 'Test'
        ]);

        $chargeId = $charge['id'];
        if ($chargeId) {
            auth()->user()->orders()->create([ // orders() in App\Models\User.php
                'cart' => serialize(session()->get('cart')) //serialize()??
            ]);

            session()->forget('cart');
            notify()->success('Transaction completed!');
            return redirect()->to('/');
        } else {
            return redirect()->back();
        }
    }

    public function order()
    {
        $orders = auth()->user()->orders;
        //  return $orders; //[{..},{..}]
        $carts = $orders->transform(function ($cart, $key) {
            return unserialize($cart->cart);
        });
        return view('order', compact('carts'));
    }
}
