<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMater extends Model
{
    use HasFactory;
    protected $table = "ordermaster";
    protected $guareded = [];

    function user(){
       return $this->belongsTo(User::class,);
    }

    public function details(){
       return $this->hasMany(OrderDetail::class,'order_id')->with('item');
    }
}
