<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // for four user_role

    // For Loggedin User
    public function order()
    {
        $orders = auth()->user()->orders()->latest()->get();
        if (count($orders) > 0) {
            return view('order', compact('orders'));
        } else {
            return view('no-items');
        }
    }

    //--------------------------------------------------------

    // for four user_role
    public function orderItems($orderId)
    {
        // URL AUTHORIZATION
        $orders = auth()->user()->orders;
        $orderIds = [];
        foreach ($orders as $key => $order) {
            array_push($orderIds, $order->id);
        }
        $isLegal = in_array($orderId, $orderIds);

        if (!$isLegal) {
            abort(403);
        }
        //END URL AUTHORIZATION
        $order = Order::find($orderId);

        $orderItems = $order->orderItem;
        return view('order-item', compact('orderItems', 'order'));
    }

    //////////////////////////////////////////////////////////////
    /////////////////////////For Admin///////////////////////////
    ////////////////////////////////////////////////////////////

    // for superadmin only
    public function userOrder()
    {
        if (auth()->user()->user_role == 'superadmin') {
            $orders = Order::latest()->get();
            return view('admin.order.index', compact('orders'));
        }
        abort(403);
    }

    //--------------------------------------------------------

    // for superadmin only
    public function viewUserOrder($orderId)
    {
        if (auth()->user()->user_role == 'superadmin') {
            // using 'Order' models not 'OrderItem' models Because I need Order for the totalPrice
            $order = Order::with('orderItem')->find($orderId);
            // URL AUTHORIZATION
            if (!$order) {
                abort(404);
            }
            //END URL AUTHORIZATION
            return view('admin.order.show', compact('order'));
        }
        abort(403);
    }

    //--------------------------------------------------------

    // for superadmin only
    public function storeOrder()
    {
        if (auth()->user()->user_role == 'superadmin') {

            $categories = Category::has('orderItem')->with(['user' => function ($query) {
                // call back function
                $query->where('user_role', 'admin');
                $query->orderBy('created_at', 'desc');
            }])->get();

            return view('admin.order.store-order', compact('categories'));
        }
        abort(403);
    }

    //--------------------------------------------------------

    // for superadmin , admin , employee
    public function viewStoreItem($categorySlug, Request $request)
    {
        // here
        $category = Category::where('slug', $categorySlug)->first();

        if (auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'employee') {
            // URL AUTHORIZATION
            $isLegal = auth()->user()->category->slug == $categorySlug;
            if (!$isLegal) {
                abort(403);
            }
            // END URL AUTHORIZATION

        } elseif (auth()->user()->user_role == 'superadmin') {
            // URL AUTHORIZATION
            if (!$category) {
                abort(404);
            }
            // END URL AUTHORIZATION

        } else {
            abort(403);
        }

        $categoryId = $category->id;
        if ($request->fromdate && $request->todate) {
            $storeItems = OrderItem::whereBetween('created_at', [$request->fromdate . " 00:00:00", $request->todate . " 23:59:59"])
                ->where('category_id', $categoryId)->get();
        } elseif ($request->fromdate) {
            $storeItems = OrderItem::where('created_at', '>=', $request->fromdate . " 00:00:00")
                ->where('category_id', $categoryId)->get();
        } elseif ($request->todate) {
            $storeItems = OrderItem::where('created_at', '<=', $request->todate . " 23:59:59")
                ->where('category_id', $categoryId)->get();
        } else {
            $storeItems = $category->orderItem;
        }
        // return $storeItems;
        // return $storeItems->groupBy('name');

        $storeItems = $storeItems->groupBy('name')->map(function ($group) {
            return [
                'name' => $group->first()['name'],
                'image' => $group->first()['image'],
                'price' => $group->first()['price'],
                'quantity' => $group->sum('quantity'),
                'category_id' => $group->first()['category_id'],
            ];
        });
        // return $storeItems;

        $filteredStoreItems = [];
        foreach ($storeItems as $key => $item) {
            array_push($filteredStoreItems, $item);
        }
        // return $filteredStoreItems;

        return view('admin.order.store-order-item', compact('filteredStoreItems', 'categorySlug'));
    }
}
