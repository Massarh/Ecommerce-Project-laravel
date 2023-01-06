<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // constractor 
    public $items = [];
    public $totalPrice;
    public $totalQuantity; // Qty = > Quantity

    // detrmine the shape of the object
    public function __construct($cart = null)
    {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        } else {
            $this->items = [];
            $this->totalPrice = 0;
            $this->totalQuantity = 0;
        }
    }

    //--------------------------------------------------------

    public function add($product)
    {
        $item = [
            'id'         => $product->id,
            'name'       => $product->name,
            'price'      => $product->price,
            'qty'        => 0, // Quantity
            'image'      => $product->image,
            "categoryId" => $product->category_id, // ORDER
        ];
        // array_key_exists() ->used to check whether a specific key or index is present inside an array or not.
        if (!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item;
            $this->totalQuantity += 1;
            $this->totalPrice += $product->price;
        } else {
            $this->totalQuantity += 1;
            $this->totalPrice += $product->price;
        }
        $this->items[$product->id]['qty'] += 1;
    }

    //--------------------------------------------------------

    public function updateQty($id, $qty)
    {
        $this->totalQuantity -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'] * $this->items[$id]['qty'];

        // add the item with new quantity
        $this->items[$id]['qty'] = $qty;
        $this->totalQuantity += $qty;
        $this->totalPrice += $this->items[$id]['price'] * $qty;
    }

    //--------------------------------------------------------

    public function remove($id)
    {
        if (array_key_exists($id, $this->items)) { // array_key_exists() function is used to check whether a specified key is present in an array or not
            $this->totalQuantity -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];

            unset($this->items[$id]); // unset() destroys the specified variables.
        }
    }
}
