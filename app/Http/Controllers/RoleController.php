<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\User;
use App\Role;


class RoleController extends Controller
{   
    public function Profiles(Request $req){
        // $users = User::all();
        $roles = Role::all();
        $users = User::with('roles')->get();   
        // $use =  User::find($req->id);
        // // $use =  User::find(4);
        // if($use){
        //     $use->makeEmployee('manager');
        // }
        return view('admin.admin_layouts.users',['users'=>$users,'roles'=>$roles]);
    }
    public function EditRole(Request $req){
        $use =  User::find($req->id);
        $use->makeEmployee($req,$req->checkbox);
        return response($tr,200);

    }
    
}
