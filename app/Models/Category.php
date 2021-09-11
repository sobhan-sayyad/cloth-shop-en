<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\GeneralFunctions;

class Category extends Model
{
    protected $fillable = ['title','image'];

    public static function getPaginated($count){
        return Category::orderBy('id','desc')->paginate($count);
    }

    public static function edit(Request $request, $id){
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image']= GeneralFunctions::upload($request);
        }
        $category=Category::findOrFail($id);
        $oldCategoryTitle= $category->title;
        $category->fill($data);
        $category->save();
        return ['oldCategoryTitle'=>$oldCategoryTitle,'category'=>$category];
    }
}
