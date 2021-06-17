<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;

use App\Http\Requests\User\UpdateRequest;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role_or_permission:control-maestro']);
        $this->middleware(['role:control-maestro']);
    }

    public function index(){
        $business = Business::get();
        $users = User::get();
        return view('admin.user.index',compact('users','business'));
    }

    public function create(){
        $roles = Role::all()->pluck('name','id');
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255|string',
            'email'=>'string|required|unique:users|max:255|email:rfc,dns',
            'password'=>'required|min:6',
            'username'=>'string|required|unique:users|max:255',
        ]);

        $user = new User;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->username= $request->username;


        if($user->save()){
            $user->assignRole($request->role);
            return redirect()->route('users.index');
        }else{
            dd('Error papu');
        }

    }

    public function show(User $user){
        return view('admin.user.show',compact('user'));
    }

    public function edit(User $user){
        $roles = Role::all()->pluck('name','id');
        return view('admin.user.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user){

        // $usuario = User::findOrFail($user->id);
        if($request->password != null){
            $user->syncRoles($request->role);
            $user->update($request->all()+[
                'password'=>bcrypt($request->password)
            ]);
        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->syncRoles($request->role);
            $user->save();
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user){

        //tienes que eliminar el role al usuario
        // $user->removeRole($user->roles->implode('name', ', '));
    }

}
