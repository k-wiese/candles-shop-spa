<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartCounter extends Component
{
    protected $listeners = ['refreshCartCounter' => '$refresh'];
    public $counter;
    public function render()
    {
        $this->counter = Cart::count();
        return view('livewire.cart-counter');
    }
}
