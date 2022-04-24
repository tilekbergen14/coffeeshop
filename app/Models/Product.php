<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
    ];

    public function favourited($user_id, $product_id){
        $faved = Favourite::where("user_id", "=", $user_id)->where("product_id", "=", $product_id)->get();
        return count($faved) === 0 ? false : true;
    }
    use HasFactory;
}
