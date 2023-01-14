<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Review;
use Livewire\WithPagination;

class ReviewComponent extends Component
{
    use WithPagination;
    public $product;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $reviews = Review::query()
            ->orderBy('created_at', 'desc')
            ->where('product_id', '=', $this->product->id)
            ->paginate(4);

        if ($reviews->count() > 0) {
            return view('livewire.review-component', ['reviews' => $reviews]);
        } else {
            return view('livewire.review-component');
        }
    }
}
