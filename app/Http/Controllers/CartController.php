<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            // access this from navbar when is empty '0'
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);
        Toastr::success('Product added to bag', 'success');
        return redirect()->back();
    }

    //--------------------------------------------------------

    public function showCart()
    {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        return view('cart', compact('cart'));
    }

    //--------------------------------------------------------

    public function updateCart(Request $request, Product $product)
    {
        $request->validate([ 
            'qty' => 'required|numeric|min:1'
        ]);

        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id, $request->qty); // qty from FORM in cart.blade.php
        session()->put('cart', $cart);

        Toastr::success('Bag updated', 'success');
        return redirect()->back();
    }

    //--------------------------------------------------------

    public function removeCart(Product $product)
    {
        $cart = new Cart(session()->get('cart'));

        $cart->remove($product->id); // remove() function in Models [Cart]

        if ($cart->totalQuantity <= 0) {
            // this will execute when we remove the last item in the cart
            session()->forget('cart'); // remove from the session
        } else {
            session()->put('cart', $cart);
        }
        Toastr::success('Product deleted successfully', 'success');
        return redirect()->back();
    }

    //--------------------------------------------------------

    public function checkout()
    {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            abort(403);
        }
        return view('checkout', compact('cart'));
    }

    //--------------------------------------------------------
    // 3rd party integration :stripe for payment ,mail from laravel to send gmail
    // css ,bootstrap ,laravel ,php, elquent(orm),query builder
    // notification library(toaster)
    // alert () 
    // livewire for loading
    public function charge(Request $request)
    {
        $cart = new Cart(session()->get('cart'));
        $amount = $cart->totalPrice;
        //return $request->stripeToken; // RETURN -> tok_1M28ryDRUJBpF05ylfYIkU6S
        $charge = Stripe::charges()->create([
            'currency' => "USD",
            'source'   => $request->stripeToken,
            // from <input name="amount" ...> in checkout.blade.php 
            'amount'   => $amount,
            'description' => 'Stripe Payment',
        ]);
        $chargeId = $charge['id'];
        // ORDER
        if ($chargeId) {
            Mail::to(auth()->user()->email)->send(new Sendmail($cart));
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'total_price' => $cart->totalPrice,
                'total_quantity' => $cart->totalQuantity
            ]);

            $newCart = [];
            foreach ($cart->items as $item) {
                array_push(
                    $newCart,
                    [
                        'name' => $item['name'],
                        'price' => $item['price'],
                        'quantity' => $item['qty'],
                        'store_id' => $item['storeId'],
                        'image' => $item['image'],
                        'order_id' => $order->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
                DB::table('products')->where('id', '=', $item['id'])
                    ->increment('number_of_sold', $item['qty']);
            }

            OrderItem::insert($newCart);

            session()->forget('cart');
            Toastr::success('Transaction completed!', 'success');
            return redirect()->to('/');
        } else {
            return redirect()->back();
        }
    }
}
