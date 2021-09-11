<?php

namespace App\Http\Controllers;

use App\Models\User;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function userProfile(){
        return view('site.userProfile');
    }

    public function userProfileEdit(Request $request){
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
        ];
        $customMessages = [
            'first_name.required' => 'Enter Your First Name',
            'last_name.required' => 'Enter Your Last Name',
        ];
        $this->validate($request, $rules, $customMessages);
        $user = Sentinel::check();
        User::edit($request,$user->id);
        $request->session()->flash('message','Your Informations Have Been Updated');
        return redirect()->back();
    }

    public function userPasswordEdit(Request $request){
        $rules = [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
        $customMessages = [
            'old_password.required' => 'Enter Your Current Password',
            'password.required' => 'Enter Your New Password',
            'password_confirmation.required' => 'Enter Your New Password Confirmation',
            'password.confirmed' => 'Password Confirmation Is Wrong',
        ];
        $this->validate($request, $rules, $customMessages);
        $user = Sentinel::check();
        if(!Hash::check($request->input('old_password'),$user->password)){
            $request->session()->flash('errorMessage','Your Current Password Is Wrong');
            return redirect()->back();
        }
        if(User::changePassword($request,$user->id)){
            $request->session()->flash('successMessage','Password Successfully Changed');
            return redirect()->back();
        }
        $request->session()->flash('errorMessage','There Has Been A Problem');
        return redirect()->back();
    }
}