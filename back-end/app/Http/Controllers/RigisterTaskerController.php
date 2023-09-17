<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasker;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RigisterTaskerController extends Controller
{
    protected function CreateStaffMember(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required',
            'phone' => 'required|numeric|min:10|unique:taskers,phone',
            'email' => 'required|string|email|max:255|unique:taskers,email',
            'role' => 'required|unique:taskers,role_id',
            'national_id' => 'required|numeric|min:16|unique:taskers,nat_id',
        ],[
            'role.unique'=>'Staff member with this role is already registered'
        ]);
    
        $image='user.png';
        $tasker=Tasker::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'image'  =>$image,
            'role_id' => $request->role,
            'nat_id' =>$request->national_id,
            'password' => bcrypt($request->phone),
        ]);

        if ($tasker) {
            return redirect()->back()->with('create_tasker','Staff member added successfully !');
        }else{
            return redirect()->back()->with('error_create_tasker','Error to register a member !');
        }
    }

}