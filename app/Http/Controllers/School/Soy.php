<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soy_Model;
use App\Models\School_Model;
use Session;

class Soy extends Controller
{
    public function index()
    {
       
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Soy_Model::where('sid', $sid)->latest()->paginate();
        return view('school.addsoy', ['data'=>$data,'data2'=>$data2]);
      
    }

    public function view()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Soy_Model::where('sid', $sid)->latest()->paginate();
        return view('school.viewsoy', ['data'=>$data,'data2'=>$data2]);
    }

    public function create(Request $request)
    {
       
        $request->validate([
          
            'name'=> 'required',  
            'class_section'=> 'required',  
            'rank'=> 'required',  
            'file_image'=> 'required | image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           
           ]);


       $image_name=$request->file('file_image')->store('public/soy'); 

        $image_save = new Soy_Model;

        $image_save->file_image=$image_name;

        $image_save->name=$request->name;
        $image_save->class_section=$request->class_section;
        $image_save->rank=$request->rank;

        $sid=Session::get('sid');

        $image_save->sid=$sid;

        $image_save->save();

        return redirect()->back()->with('success', 'Student of the Year Records has been added....');  
    }



    public function distory($id)
    {
        $school = Soy_Model::where('id',$id)->first();
        $school->delete();
        return redirect()->back()->with('warning', 'Student of the Year Records has been Deleted....');   
    }
}
