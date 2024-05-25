<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School_Model;
use App\Models\Employee_Model;
use Session;

class School extends Controller
{
    public function index()
    {
       
        return view('admin.addschool');
    }

    public function view()
    {
        $school=School_Model::latest()->paginate();
        return view('admin.viewschool', ['school'=>$school]);
    }

    public function profile()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        return view('school.profile', ['data'=>$data]);
    }

    public function password()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        return view('school.password', ['data'=>$data]);
    }


    public function logo()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        return view('school.logo', ['data'=>$data]);
    }


    public function upload(Request $request)
    {
       
        $request->validate([
            'school_id'=> 'required | unique:school__models',  
            'email'=> 'required | unique:school__models',  
            'name'=> 'required',  
            'mobile'=> 'required',  
            'address'=> 'required',  

            'school_image'=> 'required | image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           
           ]);


        $image=$request->school_image;
        $name=$image->getClientOriginalName();
       // $image->storeAs('public/images',$name);

       $image_name=$request->file('school_image')->store('public/images'); 

        $image_save = new School_Model;
        //$image_save->school_image=$name;
        $image_save->school_image=$image_name;

        $image_save->school_id=$request->school_id;
        $image_save->name=$request->name;
        $image_save->email=$request->email;
        $image_save->mobile=$request->mobile;
        $image_save->address=$request->address;
        $image_save->status="0";
        $image_save->password=\Hash::make($request->mobile);

        $image_save->save();

        return redirect()->back()->with('success', 'School Record has been added....');  
    }



    public function edit($id)
    {
      $school = School_Model::where('id',$id)->first();
      return view('admin.school_edit', ['school'=>$school]);
    }


    
    public function update(Request $request, $id)
    {
        $school = School_Model::where('id',$id)->first();
        $school->school_id=$request->school_id;
        $school->name=$request->name;
        $school->email=$request->email;
        $school->mobile=$request->mobile;
        $school->address=$request->address;
        $school->status=$request->status;
        $school->save();
        return redirect()->back()->with('success', 'School Record has been updated....');   
    }

    public function update_password(Request $request)
    {
        $sid=Session::get('sid');
   
        $request->validate([
            'password'=> 'required | min :6 | confirmed' 
           ]);

           $user_type=Session::get('user_type');
           if($user_type=="admin")
           {
            $school = School_Model::where('id',$sid)->first();
           }
           else{
            $email=Session::get('email');
            $school = Employee_Model::where('email',$email)->where('sid',$sid)->first();
           }
        
        $school->password=\Hash::make($request->password);

        $school->save();
        return redirect()->back()->with('success', 'Password has been updated....');   
    }

    public function update_profile(Request $request)
    {
        $sid=Session::get('sid');
        $email=Session::get('email');

        if($email!=$request->email)
        {
        $request->validate([
            'email'=> 'required | unique:school__models',       
           ]);
        }
     

        $school = School_Model::where('id',$sid)->first();
        $school->name=$request->name;
        $school->email=$request->email;
        $school->mobile=$request->mobile;
        $school->address=$request->address;
        $school->save();
        return redirect()->back()->with('success', 'School Record has been updated....');   
    }


    public function update_logo(Request $request)
    {
        $sid=Session::get('sid');

        $request->validate([
 
            'file_image'=> 'required | image | mimes:jpeg,png,jpg,gif,svg | max:2048'
           
           ]);


       $image_name=$request->file('file_image')->store('public/images'); 
        $image_save  = School_Model::where('id',$sid)->first();
        $image_save->school_image=$image_name;

        $image_save->save();

        return redirect()->back()->with('success', 'School Logo has been updated....');   
    }



    public function distory($id)
    {
        $school = School_Model::where('id',$id)->first();
        $school->delete();
        return redirect()->back()->with('warning', 'School Record has been Deleted....');   
    }
}
