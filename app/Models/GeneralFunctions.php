<?php

namespace App\Models;

use Illuminate\Http\Request;

class GeneralFunctions 
{
    public static function upload(Request $request){
        $path = $request->file('image')->store('public');
        return $path;
    }

    public static function finalPrice($product){
        return round(($product->price) - (($product->price)*($product->discount)/100),2);
    }
}
