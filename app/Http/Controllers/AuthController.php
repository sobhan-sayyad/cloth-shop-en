<?php

namespace App\Http\Controllers;

use App\Models\User;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }

    public function registerPage(){
        return view('auth.register');
    }

    public function createAccount(Request $request){
        $rules = [
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'checkbox' => 'required',
        ];
        $customMessages = [
            'required.email' => 'Enter Your Email',
            'required.first_name' => 'Enter Your First Name',
            'required.last_name' => 'Enter Your Last Name',
            'required.password' => 'Enter Password',
            'required.password_confirmation' => 'Enter Password Confirmation',
            'required.checkbox' => 'You have to accept the Terms and Conditions for makeing an account',
            'confirmed' => 'Password Confirmation Is Wrong'
        ];
        $this->validate($request, $rules, $customMessages);

        $email = $request->input('email');
        $emailExist = User::checkExistEmail($email);
        if($emailExist){
            $request->session()->flash('message','There is an account alrdeay made for'.$email);
            return redirect()->back();
        }

        $data = $request->all();
        Sentinel::registerAndActivate($data);
        Sentinel::authenticateAndRemember($data);
        return redirect()->route('site.index');
    }

    public function loginAccount(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $customMessages = [
            'required.email' => 'Insert Your Email',
            'required.password' => 'Insert Your Password'
        ];
        $this->validate($request, $rules, $customMessages);

        $data = $request->all();
        if(isset($data['remember'])){
            if($user=Sentinel::authenticateAndRemember($data)){  
                if($user->type == 'admin'){
                return redirect()->route('admin.dashboard');
                }
                return redirect()->route('site.index');
            }else{
                $request->session()->flash('message','Your Login Informations Are Incorrect');
                return redirect()->back();
            }
        }
        if($user=Sentinel::authenticate($data)){
            if($user->type == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('site.index');
        }
        $request->session()->flash('message','Your Login Informations Are Incorrect');
        return redirect()->back();
    }
    
    public function logoutAccount(){
        Sentinel::logout();
        return redirect()->route('admin.login');
    }
}
