<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use App\Models\SoldProducts;
use Illuminate\Support\Facades\Auth;

class OrderShow extends Component
{
    public $order;
    
    public function render()
    {
        if($this->order->user_id === Auth::user()->id)
        {
            
            
            $sold_products = SoldProducts::where('order_id','=',$this->order->id)->get();
         
            $products = collect();
            foreach($sold_products as $empty_product)
            {
                
                $product = Product::where('id','=',$empty_product->product_id)->first();

                $product->qty = $empty_product->qty;
                $product->price = $empty_product->price;
                $products->push($product);
            }
            
            return view('livewire.order-show', compact('products'));
        }
        else
        {
            return view('livewire.dashboard-component');
        }
    }
    public function mount($id)
    {
        $this->order = Order::findOrFail($id);

        

    }
}
