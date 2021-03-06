<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function user_name()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function totalOrders($id)
    {
        return OrderDetail::where('product_id',$id)->count();

    }

   
    
}

