<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function index(){
    	// return view('auth.register');
        return redirect()->route('login');
    }

    public function store(Request $request){
    	//validamos el request
    	$this->validate($request,[
    		'name'=>'required|max:255',
    		'username'=>'required|max:255',
    		'email'=>'required|max:255|email',
    		'password'=>'required|confirmed',
    	]);
    	//guardamos el requsts
    	User::create([
    		'name'=>$request->name,
    		'username'=>$request->username,
    		'email'=>$request->email,
    		'password'=>Hash::make($request->password),
    	]);
    	//ingresamos con el request
    	auth()->attempt($request->only('email','password'));
    	//redireccionamos con el request
    	return redirect()->route('categories.index');
    }

}
