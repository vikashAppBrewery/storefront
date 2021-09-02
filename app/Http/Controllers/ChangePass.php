<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    //

    public function Cpassword(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request) {

        $validateData = $request->validate([
            'oldpassword' => 'required', 
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'password is changed successfully use your new password to login again');
        }else{
            return redirect()->back()->with('error', 'current password does not match');
        }

    }
}
