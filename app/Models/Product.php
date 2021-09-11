<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $fillable = ['title','product_code','category_id','image','type','price','discount'];

    public static function getPaginated($count){
        return Product::join('categories','categories.id','products.category_id')
        ->select('products.*','categories.title as category_title')
        ->orderBy('products.id','desc')->paginate($count);
    }

    public static function edit(Request $request, $id){
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image']= GeneralFunctions::upload($request);
        }
        $product=Product::findOrFail($id);
        $oldProductTitle=$product->title;
        $product->fill($data);
        $product->save();
        return ['oldProductTitle'=>$oldProductTitle, 'product'=>$product];
    }

    public static function bestOffer(){
        $maxDiscount = Product::max('discount');
        return Product::where('discount', $maxDiscount)->first();
    }

    public static function randomProduct($id){
        return Product::where('category_id', $id)->inRandomOrder()->limit(3)->get();
    }

    public static function searchProducts($subject){
        return Product::join('categories','categories.id','products.category_id')->
        where('products.title','LIKE',"%{$subject}%")->
        orWhere('categories.title','LIKE',"%{$subject}%")->
        select('products.*','categories.title as category_title')->
        paginate(12);
    }
}
