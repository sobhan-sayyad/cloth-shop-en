<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::getPaginated(10);
        return view('admin.customers' ,compact('customers'));
    }

    public function delete(Request $request, $id){
        $user = User::findOrFail($id);
        $user->delete();
        $request->session()->flash('deleteMessage','customer '.$user->fist_name.' '.$user->last_name.' has been deleted');
        return redirect()->back();
    }
}
