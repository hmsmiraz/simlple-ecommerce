<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        //$products=Product::all();
        $roles=Role::latest()->get();
        return view('backend.roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.roles.create');
    }

    public function show(Role $role)
    {
        //$users = User::('role_id',$role->id)->get();
       $users =  $role->users;
       return view('backend.roles.show',compact('users'));
    }
}
