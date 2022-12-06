<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class SoldProducts extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function userId()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


    protected $table = 'sold_products';

    protected $primaryKey = 'id';
    protected $fillable = ['name','price','qty','product_id','order_id','user_id'];
}
