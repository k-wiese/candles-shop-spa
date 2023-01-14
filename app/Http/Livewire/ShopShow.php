<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\SoldProducts;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ShopShow extends Component
{

    public $product;
    public $qty = 1;
    public $rating;
    public $comment;

    protected $rules = [
      'rating'=>'integer|min:1|max:5',
      'comment'=>'string|min:1|max:50'
    ];
    public function render()
    {
      $user_allowed_to_review = false;
      if(Auth::check())
      {
        if(SoldProducts
        ::where('user_id','=',Auth::user()->id)
        ->where('product_id','=',$this->product->id)
        ->get()
        ->count() > 0){

          if(isset(Auth::user()->review))
          {
            if(Auth::user()->review->where('product_id','=',$this->product->id)->count() == 0)
            {
              
              $user_allowed_to_review = true;
            }
            else
            {

              $user_allowed_to_review = false;
            }
              
          }
          else
          {
            $user_allowed_to_review = true;
          }
        } 
      }

      $rating = 0;
      if(!($this->product->review->count() === 0))
      {
        foreach($this->product->review as $review)
        {

          $rating += $review->rating;
        }
        $rating = $rating/$this->product->review->count();
        $this->product->rating = (intval(ceil($rating)));
        $this->product->save();
      }
      else
      {
        $this->product->rating = 'Not rated yet, be first!';
      }
      return view('livewire.shop-show',[
        'cart'=>Cart::content(),
        'allowed'=>$user_allowed_to_review
      ]);
    }

    public function mount($product_id)
    {
      $this->product = Product::findOrFail($product_id);
    }

    public function store_review()
    {
      $this->validate();

      Review::create([
        'user_name'=>Auth::user()->name,
        'rating' => $this->rating,
        'comment' => $this->comment,
        'product_id'=>$this->product->id,
        'user_id'=>Auth::user()->id
      ]);
      return redirect(request()->header('Referer'));
    }

    public function store()
    {
      $price = $this->product->price;

      if($this->product->discount)
      {
        $price = $price - ($this->product->price * ($this->product->discount_value / 100));
      }

        Cart::add(
          $this->product->id, 
          $this->product->name, 
          $this->qty,
          $price,
      );
      $this->emit('refreshCartCounter');
    }
}
