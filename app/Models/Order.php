<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SoldProducts;

class Order extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function soldProduct()
    {
        return $this->hasMany(SoldProducts::class);
    }

    

    protected $table = 'orders';

    protected $primaryKey = 'id';
    protected $fillable = ['price','user_id','is_paid'];

}
