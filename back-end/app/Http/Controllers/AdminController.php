<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\TaskerRole;
use App\Models\Tasker;
use App\Models\aboutus;
use App\Models\Es;
use App\Models\Servicetb;
use App\Models\Car;

use Validator;

class AdminController extends Controller
{
    public function dashboard(){
    	return view('user.home');
    }

    public function MyInformation(){
        return view('user.MyInformation');
    } 

    public function Profile(){
        return view('user.Profile');
    }

    public function Post_Profile(Request $request){
        $id=auth()->guard('admin')->user()->id;
        $request->validate([
            'profile_picture' => 'mimes:jpg,jpeg,png,pdf',
        ],[
            'profile_picture.mimes'=>'profile picture must be in format of jpg,jpeg,png or pdf',
        ]);

        $datas=Admin::find($id);
        if($request->hasFile('profile_picture')){
                $file= $request->file('profile_picture');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $extenstion = $file->getClientOriginalExtension();
                $file-> move(public_path('assets/images/'), $filename);
                $datas['image']= $filename;
        }

        $datas->save();

        return redirect()->back()->with('profile_changed','profile changed  successfully !');
        
    }

    public function Update_MyInfo(Request $request){
        $id=auth()->guard('admin')->user()->id;
        $data =Admin::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->save();
        return redirect()->back()->with('success','data Updated successfully !');
    }

    public function Password(){
        return view('user.Password');
    }

    public function Post_Password(Request $request){
        # Validation
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8|max:100',
        ]);

        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->guard('admin')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        Admin::whereId(auth()->guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

    //adding properties like cars
    public function Add_Properties(){
        return view('user.properties');
    }

    public function Post_new_car(Request $request){
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'period' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'plate' => 'required|string',
            'counts' => 'required|numeric',
        ]);

        $data =new Car;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->counts = $request->counts;
        $data->plate = $request->plate;
        $data->period = $request->period;
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $extenstion = $file->getClientOriginalExtension();
            $file-> move(public_path('assets/images/admin/car'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->back()->with('success','data inserted successfully !');
    }

}