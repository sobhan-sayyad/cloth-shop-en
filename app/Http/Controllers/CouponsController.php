<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index(){
        $coupons = Coupon::getPaginated(8);
        $customers = User::where('type','user')->get();
        return view('admin.coupons',compact('coupons','customers'));
    }

    public function add(Request $request){
        $ruls=[
            'title'=>'required',
            'user_id'=>'required',
            'amount'=>'required',
            'time'=>'required',
        ];
        $customMessages=[
            'title.required'=>'Fill the Title box',
            'user_id.required'=>'Choose a User',
            'amount.required'=>'Fill the Amount box',
            'time.required'=>'Choose a Time',
        ];
        $this->validate($request, $ruls, $customMessages);

        $data=$request->all();
        $coupon=Coupon::create($data);
        $request->session()->flash('message',$coupon->title. ' created.');
        return redirect()->back();
    }

    public function edit(Request $request, $id){
        $ruls=[
            'title'=>'required',
            'user_id'=>'required',
            'amount'=>'required',
            'time'=>'required',
        ];
        $customMessages=[
            'title.required'=>'Fill the Title box',
            'user_id.required'=>'Choose a User',
            'amount.required'=>'Fill the Amount box',
            'time.required'=>'Choose a Time',
        ];
        $this->validate($request, $ruls, $customMessages);

        $response=Coupon::edit($request, $id);
        $request->session()->flash('message',$response['oldCouponTitle'].' has changed to '.$response['coupon']->title);
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        $coupon=Coupon::findOrFail($id);
        $coupon->delete();
        $request->session()->flash('deleteMessage',$coupon->title.' has been deleted');
        return redirect()->back();
    }
}
