<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function ChangePassword(){
        return view('admin.body.change_password');
    }
    public function PasswordUpdate(Request $request){
        $validateData= $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user=User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Is Change Succussfully.');

        }else{
            return redirect()->back()->with('error','Current Password Is Invalid');
        }
        
    }

    public function PUpdate(){
        if(Auth::user()){
            $user= User::find(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile',compact('user'));
            }
        }

    } 
    public function ProfileUpdate(Request $request){
            $user= User::find(Auth::user()->id);
            if($user){
                $user->name = $request['name'];
                $user->email = $request['email'];
                
                $user->save();
                return Redirect()->back()->with('success','User Profile Is Update Successfully.');

            }
       

    } 
}
