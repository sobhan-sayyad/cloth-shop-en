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

    public function cart(){
        return view('site.cart');
    }

    public function addToCart(Request $request, $id){
        $ruls=[
            'quantity'=>'required'
        ];
        $customMessages=[
            'required'=>'Quantity can not be empty'
        ];
        $this->validate($request, $ruls, $customMessages);
        $data = $request->all();
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [
                $id =>[
                    "title"=>$product->title,
                    "quantity"=>$data['quantity'],
                    "price"=>$product->price,
                    "discount"=>$product->discount,
                    "image"=>$product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success','Product added to cart successfully!');
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']+=$data['quantity'];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "title"=>$product->title,
            "quantity"=>$data['quantity'],
            "price"=>$product->price,
            "discount"=>$product->discount,
            "image"=>$product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart($id){
        
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product removed frome cart');
                return redirect()->back();
            }
            abort(404);
    }

    public function addOneToCart($id){
        
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            session()->flash('success', 'Added one');
            return redirect()->back();
        }
        abort(404);
    }

    public function subtractOneFromCart($id){
        
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            if($cart[$id]['quantity'] == 1){
                unset($cart[$id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product removed frome cart');
                return redirect()->back();
            }
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
            session()->flash('success', 'Subtracted one');
            return redirect()->back();
        }
        abort(404);
    }
}
