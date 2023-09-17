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
        return redirect()->back()->with('success','data Updated !');
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

    public function aboutdata(){
        $aboutdata=aboutus::all();

        return view('users.Admin.ViewAboutUs',compact('aboutdata'));
    }

    public function editabout($id){
        $about =aboutus::find($id);
        return view('users.Admin.editabout',compact('about'));
    }
    public function UpdateAbout(Request $request, $id)
    {
        $post =aboutus::find($id);
        // if($request->hasFile('Upload_image')){
        //     $file= $request->file('Upload_image');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file-> move(public_path('images/blog'), $filename);
        //     $post['image']= $filename;
        // }
        
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect(route('editabout'))->with('status','data Updated Successfully');
    }

    public function FormServices(){
        return view('users.Admin.Services');
    }

    function ViewStaffMembers(){
        $staffdata=Tasker::paginate(5);
        return view('users.Admin.ViewStaff',compact('staffdata'));
    }

    function EditStaffMembers($id){
        $staffdata =Tasker::find($id);
        return view('users.Admin.EditStaffMembers',compact('staffdata'));
    }

    public function UpdateStaffMembers(Request $request,$id){
        $data =Tasker::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->nat_id = $request->nat_id;
        $data->password =hash::make($request->phone);
        $data->save();
        return redirect(route('staffmembers'))->with('status','data Updated Successfully');
    }

    function EditEs($id){
        $staffdata =Es::find($id);
        return view('users.Admin.EditEs',compact('staffdata'));
    }

    public function UpdateEs(Request $request,$id){
        $data =Es::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->nat_id = $request->nat_id;
        $data->password =hash::make($request->phone);
        $data->save();
        return redirect(route('staffmembers'))->with('status','data Updated Successfully');
    }

    function EditRole($id){
        $role_data =TaskerRole::find($id);
        return view('users.Admin.EditRole',compact('role_data'));
    }

    function UpdateRoles(Request $request,$id){
        $data =TaskerRole::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect(route('staffroles'))->with('status','data Updated Successfully');
    }

    public function FormService(){
        return view('users.Admin.Services');
    }

    public function CreateService(Request $request){
         $request->validate([
                'title' => 'required',
                'content' => 'required|max:255',
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);

             if($request->hasfile('filename'))
             {

                foreach($request->file('filename') as $image)
                {
                    $extenstion = $image->getClientOriginalExtension();
                    $name=date('YmdHi').'.'.$image->getClientOriginalName();
                    $image-> move(public_path('assets/images/'), $name); 
                    $data[] = $name;  
                }
             }

            $form= new Servicetb();
            $form->title = $request->title;
            $form->image=json_encode($data);
            $form->content = $request->content;
            $form->save();

            return redirect()->back()->with('service_added','Service content added successfully !');

    }

    public function ViewService(){
        $servicedata=Servicetb::orderBy('id','desc')->paginate(5);
        return view('users.Admin.ViewService',compact('servicedata'));
    }

    public function DeleteService($id){
        $DeleteService=Servicetb::find($id)->delete();
        return redirect()->back()->with('service_deleted','Service deleted !');
    }

    public function EditService($id){
        $ServiceData=Servicetb::find($id);
        return view('users.Admin.EditService',compact('ServiceData'));
    }

    public function UpdateServices(Request $request,$id){
            $request->validate([
                'title' => 'required',
                'content' => 'required|max:255',
                'filename'=>'required',
                'filename.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

            $form=Servicetb::find($id);
             if($request->hasfile('filename'))
             {

                foreach($request->file('filename') as $image)
                {
                    $extenstion = $image->getClientOriginalExtension();
                    $name=date('YmdHi').'.'.$image->getClientOriginalName();
                    $image-> move(public_path('assets/images/'), $name); 
                    $data[] = $name;  
                }
             }

            $form->title = $request->title;
            $form->image=json_encode($data);
            $form->content = $request->content;
            $form->save();

        return redirect(route('ViewServices'))->with('status','Service updated !');
    }
}

