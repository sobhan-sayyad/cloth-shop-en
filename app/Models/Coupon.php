<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Coupon extends Model
{
    protected $fillable = ['title','user_id','amount','time'];

    public static function getPaginated($count){
        return Coupon::join('users','users.id','coupons.user_id')
        ->select('coupons.*','users.first_name as user_first_name','users.last_name as user_last_name')
        ->orderBy('coupons.id','desc')->paginate($count);
    }

    public static function edit(Request $request, $id){
        $data = $request->all();
        $coupon=Coupon::findOrFail($id);
        $oldCouponTitle=$coupon->title;
        $coupon->fill($data);
        $coupon->save();
        return ['oldCouponTitle'=>$oldCouponTitle, 'coupon'=>$coupon];
    }
}
