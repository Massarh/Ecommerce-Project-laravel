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
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);

        Toastr::success('Product added to cart', 'success');
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
        // dd($cart->items);
        return view('cart', compact('cart'));
    }

    //--------------------------------------------------------

    public function updateCart(Request $request, Product $product)
    {
        $request->validate([ //156 in Cart page to update the qty must be least 1
            'qty' => 'required|numeric|min:1'
        ]);

        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id, $request->qty); // qty from FORM in cart.blade.php
        session()->put('cart', $cart);

        Toastr::success('Cart updated', 'success');
        return redirect()->back();
    }

    //--------------------------------------------------------

    public function removeCart(Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id); // remove() function in Models [Cart]

        if ($cart->totalQuantity <= 0) {
            session()->forget('cart'); // remove from the session
        } else {
            session()->put('cart', $cart);
        }

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

    public function charge(Request $request)
    {
        $cart = new Cart(session()->get('cart'));
        $amount = $cart->totalPrice;
        //return $request->stripeToken; // RETURN -> tok_1M28ryDRUJBpF05ylfYIkU6S
        $charge = Stripe::charges()->create([
            'currency' => "USD",
            'source' => $request->stripeToken,
            'amount' => $amount,
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
                        'category_id' => $item['categoryId'],
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
            // hereeeeee
            Toastr::success('Transaction completed!', 'success');
            return redirect()->to('/');
        } else {
            return redirect()->back();
        }
    }
}
