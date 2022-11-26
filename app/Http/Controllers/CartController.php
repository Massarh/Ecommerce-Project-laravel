<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Category;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        //how product is exist
        $cart->add($product);

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
        // 
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        } 
        Mail::to(auth()->user()->email)->send(new Sendmail($cart));
// ORDER
        if ($chargeId) {
            //should be edited
            $cart=session()->get('cart') ;
            $order= Order::create([ 
                'user_id'=>auth()->user()->id,
                'total_price'=>$cart->totalPrice,
                'total_quantity'=>$cart->totalQuantity
            ]);
            // return $order;

            foreach ($cart->items as $item) { // rep createMany

                OrderItem::create([ // بعمل كريات بحسب عدد الايتم
                    'name'=>$item['name'], // from Cart model only [db ما وصلت ال]
                    'price'=>$item['price'],
                    'quantity'=>$item['qty'],
                    'order_id'=>$order->id, // from db [db انشئت من]
                    'category_id'=>$item['categoryId'],
                    'image'=>$item['image'],

                ]);
            }
            
            session()->forget('cart');
            notify()->success('Transaction completed!');
            return redirect()->to('/');
        } else {
            return redirect()->back();
        }
    }

    // For Loggedin User
    public function order()
    {
        $orders = auth()->user()->orders;
        //  return $orders; //[{..},{..}]
        $carts = $orders->transform(function ($cart, $key) {
            return unserialize($cart->cart);
        });
        return view('order', compact('carts'));
    }

//////////////////////////////////////////////////////////////
/////////////////For Admin///////////////////////////////////
////////////////////////////////////////////////////////////

    // For Admin
    public function userOrder()
    {
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }

// Cart[ORDER]
    public function viewUserOrder($orderid)
    {
         //should be edit
        $order = Order::with('orderItem')->where('id', $orderid)->first();
        // return $order->orderItem[0]->category;
        return view('admin.order.show', compact('order'));
    }

    public function storeOrder()
    {
        //should be edit
        $categories = Category::has('orderItem')->with(['user' => function ($query) { // call back function
            $query->where('user_role', 'admin');
            $query->orderBy('created_at', 'desc');
        }])->get();
        return view('admin.order.store-order', compact('categories'));
    }


    public function viewStoreItem($categoryId, Request $request)
    {
        if ($request->fromdate && $request->todate) {
            $storeItems=OrderItem::whereBetween('created_at', [$request->fromdate." 00:00:00", $request->todate." 23:59:59"])
            ->where('category_id',$categoryId)->get();

        } elseif ($request->fromdate) {
            $storeItems=OrderItem::where('created_at', '>=', $request->fromdate." 00:00:00")
            ->where('category_id',$categoryId)->get();

        } elseif ($request->todate) {
            $storeItems=OrderItem::where('created_at', '<=', $request->todate." 23:59:59")
            ->where('category_id',$categoryId)->get();

        } else {
            $storeItems=OrderItem::where('category_id',$categoryId)->get();
        }

        // return  $storeItems;
        return view('admin.order.store-order-item', compact('storeItems'));
    }
}
