<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
    public function Logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','User Logout.');


    }
}
