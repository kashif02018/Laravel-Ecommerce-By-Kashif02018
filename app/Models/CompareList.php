<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompareList extends Model
{
    use HasFactory;
    protected $table = 'compare_list';
    protected $guarded = [];

    public function user_name()
    {
        return $this->belongsTo(User::class,'id');
    }

    function item(){
        return $this->belongsTo(Products::class,'product_id');
     }

   
    
}

