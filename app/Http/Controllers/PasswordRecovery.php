<?php

namespace App\Http\Controllers;

use App\Mail\SendRecoveryMail;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use App\Models\Reminder as MyReminder;
use Illuminate\Http\Request;

class PasswordRecovery extends Controller
{
    public function userPasswordRecovery(Request $request){
        $rules = [
            'email' => 'required'
        ];
        $customMessages = [
            'required' => 'Enter your account Email',
        ];
        $this->validate($request, $rules, $customMessages);

        $email = $request->input('email');
        if(User::checkExistEmail($email)){
            $user = User::findUserByEmail($email);
            $user = Sentinel::findById($user ->id);
            $reminder = Reminder::create($user);
            $emaileData = [
                'subject'=>'Password Recovery',
                'body'=>'To recover your password click on following link',
                'link'=>'http://localhost:8000/passwordReset/'. $reminder->code
            ];
            \Mail::to($email)->send(new SendRecoveryMail($emaileData));
        }
        $request->session()->flash('message','Recovery mail has been sent to your Email');
        return redirect()->back();
    }

    public function passwordReset(Request $request, $code){
        $reminder = MyReminder::findReminderBycode($code);
        if(count($reminder) == 0){
            return abort(404);
        }
        $reminder = $reminder[0];
        if($reminder->completed == 1){
            return abort(404);
        }
        return view('auth.passwordReset',compact('code'));
    }

    public function passwordResetSubmit(Request $request, $code){
        $rules = [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
        $customMessages = [
            'password.required' => 'Enter your password',
            'password_confirmation.required' => 'Enter password confirmation',
            'password.confirmed' => 'Password confirmation does not match',
        ];
        $this->validate($request, $rules, $customMessages);

        $reminder = MyReminder::findReminderBycode($code);
        if(count($reminder) == 0){
            return abort(404);
        }
        $reminder = $reminder[0];
        if($reminder->completed == 1){
            return abort(404);
        }
        
        $result = User::resetPassword($request,$reminder->user_id,$code);
        if(!$result){
            $request->session()->flash('message','There has been an issue');
            return redirect()->back();
        }
        $request->session()->flash('message','Password has been recovered successfully');
        return view('auth.login');
    }
}
