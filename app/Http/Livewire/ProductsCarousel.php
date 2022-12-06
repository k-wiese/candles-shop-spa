<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsCarousel extends Component
{
    public function render()
    {
        $products = Product::get();

        $slides = $products->chunk(4);
        return view('livewire.products-carousel',['slides'=>$slides]);
    }

}
