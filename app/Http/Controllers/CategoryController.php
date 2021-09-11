<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralFunctions;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::getPaginated(8);
        return view('admin.categories', compact('categories'));
    }

    public function add(Request $request){
        $ruls=[
            'title'=>'required',
            'image'=>'required'
        ];
        $customMessages=[
            'title.required'=>'Fill the Title box',
            'image.required'=>'Choose an Image'
        ];
        $this->validate($request, $ruls, $customMessages);

        $imagePath=GeneralFunctions::upload($request);
        
        $data=$request->all();
        $data['image']=$imagePath;
        $category= Category::create($data);
        $request->session()->flash('message',$category->title.' created.');
        return redirect()->back();
    }

    public function edit(Request $request, $id){
        $ruls=[
            'title'=>'required'
        ];
        $customMessages=[
            'title.required'=>'Fill the Title box'
        ];
        $this->validate($request, $ruls, $customMessages);
        
        $response=Category::edit($request,$id);
        $request->session()->flash('message',$response['oldCategoryTitle'].' has changed to '.$response['category']->title);
        return redirect()->back();
    }
    
    public function delete(Request $request, $id){
        $category=Category::findOrFail($id);
        $category->delete();
        $request->session()->flash('deleteMessage',$category->title.' has been deleted');
        return redirect()->back();
    }
}
