<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralFunctions;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::getPaginated(8);
        $categories = Category::all();
        return view('admin.products',compact('products','categories'));
    }

    public function add(Request $request){
        $ruls=[
            'title'=>'required',
            'image'=>'required',
            'product_code'=>'required',
            'category_id'=>'required',
            'type'=>'required',
            'price'=>'required'
        ];
        $customMessages=[
            'title.required'=>'Fill the Title box',
            'image.required'=>'Choose an Image',
            'product_code.required'=>'Fill the Product Code box',
            'category_id.required'=>'Choose a Category',
            'type.required'=>'Choose a type',
            'price.required'=>'pick a price'
        ];
        $this->validate($request, $ruls, $customMessages);

        $imagePath=GeneralFunctions::upload($request);

        $data=$request->all();
        $data['image']=$imagePath;
        $product=Product::create($data);
        $request->session()->flash('message',$product->title. ' created.');
        return redirect()->back();
    }

    public function edit(Request $request, $id){
        $ruls=[
            'title'=>'required',
            'product_code'=>'required',
            'category_id'=>'required',
            'type'=>'required',
            'price'=>'required'
        ];
        $customMessages=[
            'title.required'=>'Fill the Title box',
            'product_code.required'=>'Fill the Product Code box',
            'category_id.required'=>'Choose a category',
            'type.required'=>'Choose a type',
            'price.required'=>'pick a price'
        ];
        $this->validate($request, $ruls, $customMessages);

        $response=Product::edit($request, $id);
        $request->session()->flash('message',$response['oldProductTitle'].' has changed to '.$response['product']->title);
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        $product=Product::findOrFail($id);
        $product->delete();
        $request->session()->flash('deleteMessage',$product->title.' has been deleted');
        return redirect()->back();
    }
}
