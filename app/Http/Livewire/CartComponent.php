<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\SoldProducts;



class CartComponent extends Component
{
    public $cart;
    public $products;
    public $user_message;
    
    public function render(){
        $this->cart = Cart::content();
        return view('livewire.cart-component');
    }

    public function mount(){
        
        $this->products = Product::get();
    }

    public function destroy_item($rowid)
    {
        Cart::remove($rowid);
    }

    public function store($is_paid)
    {
        $price = intval(floatval(str_replace(',','',Cart::total())) + floatval(str_replace(',','',Cart::tax())));

        if($is_paid)
        {
            
            $order = Order::create([
                'price' => $price,
                'user_id' => Auth::user()->id,
                'is_paid' => true
            ]);

            foreach(Cart::content() as $item)
            {
                SoldProducts::create([
                    'name'=> $item->name,
                    'price'=> $item->price,
                    'qty'=> $item->qty,
                    'product_id'=> $item->id,
                    'order_id'=> $order->id,
                    'user_id'=> Auth::user()->id,
                ]);
            }
    
            Cart::destroy();
            $this->user_message = 'Payment successfull! Go to Account  for order details.';
            $this->is_paid = true;
        }
        else
        {
            Order::create([
                'price' => $price,
                'user_id' => Auth::user()->id,
                'is_paid' => false
            ]);
            $this->user_message = 'Payment unsuccessfull. Try again later.';
            $this->is_paid = false;

        }

    }
}
