<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralFunctions;
use App\Models\Product;
use Illuminate\Http\Request;

class SitePagesController extends Controller
{
    public function index(){
        $especial = Product::bestOffer();
        $categories = Category::all();
        $categoryProducts = [];
        $i = 0;
        foreach ($categories as $category){
            $categoryProducts[$i] = Product::randomProduct($category->id);
            $i++;
        }
        return view('site.index',compact('especial','categories','categoryProducts'));
    }

    public function shop(){
        $products = Product::getPaginated(12);
        $categories = Category::all();
        return view('site.shop', compact('products','categories'));
    }

    public function productPage($id){
        $product = Product::findOrFail($id);
        if(isset($product->discount)){
            $finalPrice = GeneralFunctions::finalPrice($product);
            return view('site.productPage', compact('product','finalPrice'));
        }
        return view('site.productPage', compact('product'));
    }

    public function search(Request $request){
        $ruls=[
            'subject'=>'required'
        ];
        $customMessages=[
            'required'=>'Type Something To Search For'
        ];
        $this->validate($request, $ruls, $customMessages);
        $data = $request->all();
        $products = Product::searchProducts($data['subject']);
        $categories = Category::all();
        return view('site.shop', compact('products','categories'));
    }
}
