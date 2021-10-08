<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();
          
        if($roles[0]=='Admin')
            $users = User::where('id','!=',$user->id)
                    ->where('id','!=',1)
                    ->get();
        else
            $users = User::all();

        return view('admin.user.index',compact('users'));
    }


    public function create()
    {
        $countries =Country::pluck('name','id');
        $roles=Role::pluck('name','id');
        return view('admin.user.create',compact('roles','countries'));        
    }

 
    public function store(Request $request)
    {
        $user= User::create($request->all())->assignRole('Post');;
        return redirect()->route('admin.user.index')->with('info','Usuario creado con exito');

    }
    
    
    public function edit(User $user)
    {
        $roles=Role::all();

        return view('admin.user.edit',compact('user','roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.user.index')->with('info','Roles asignados con exito');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('info','El usuario se elimino con exito');;
    }
}
