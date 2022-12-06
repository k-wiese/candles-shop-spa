<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\Review;


class DashboardComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        
        $orders = Order::query()->where('user_id','=',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(4,'*','orders_page');

        $reviews = Review::query()->where('user_id','=',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(4,'*','reviews_page');
        return view('livewire.dashboard-component',compact('orders', 'reviews'));
    }
    public function delete_review($id)
    {
        Review::destroy($id);
    }

}
