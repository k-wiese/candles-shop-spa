<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\SoldProducts;

class Product extends Model
{
    use HasFactory;

    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function soldProduct()
    {
        return $this->hasMany(SoldProducts::class);
    }
    
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'price', 'photo_sq', 'photo','description','color', 'discount', 'discount_value', 'type', 'rating'];
}
