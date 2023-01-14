<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sortBy = 'name';
    public $asc_or_desc = 'asc';
    public $search_query;
    public $discount_only;
    public $type;

    public $perPage = 9;


    protected $listeners = [
        'load-more' => 'loadMore'
    ];
    public function loadMore()
    {
        $this->perPage = $this->perPage + 6;
    }

    public function render()
    {
        if ($this->search_query) {
            $products = Product::query()
                ->where('name', 'LIKE', '%' . $this->search_query . '%')
                ->orderBy($this->sortBy, $this->asc_or_desc);
        } else {
            $products = Product::query()->orderBy($this->sortBy, $this->asc_or_desc);
        }

        if ($this->discount_only) {
            $products = $products->where('discount', '!=', null);
        }
        if ($this->type) {
            $products = $products->where('type', '=', $this->type);
        }
        $products = $products->paginate($this->perPage);
        return view('livewire.shop', compact('products'));
    }

}
