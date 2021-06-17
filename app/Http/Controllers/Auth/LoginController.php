<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
    	return view('auth.login');
    }

    public function store(Request $request){


    	$this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required|max:255',
    	]);

    	if(!auth()->attempt($request->only('email','password'),$request->remember)){
    		return back()->with('status','Error en las credenciales');
    	}
        return redirect()->route('home.index');
    }

}
