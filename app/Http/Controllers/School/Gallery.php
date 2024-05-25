<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery_Model;
use App\Models\School_Model;
use Session;

class Gallery extends Controller
{
    public function index()
    {
       
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Gallery_Model::where('sid', $sid)->latest()->paginate();
        return view('school.addgallery', ['data'=>$data,'data2'=>$data2]);
      
    }


    public function website()
    {
       
        $sid="1";

        $data=Gallery_Model::where('sid', $sid)->orderBy('id', 'DESC')->get();
        return view('website.gallery', ['data'=>$data]);
      
    }

    public function view()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Gallery_Model::where('sid', $sid)->latest()->paginate();
        return view('school.viewgallery', ['data'=>$data,'data2'=>$data2]);
    }

    public function create(Request $request)
    {
       
        $request->validate([
          
            'title'=> 'required',  
            'file_image'=> 'required | image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           
           ]);


       $image_name=$request->file('file_image')->store('public/gallery'); 

        $image_save = new Gallery_Model;

        $image_save->file_image=$image_name;

        $image_save->title=$request->title;
        $image_save->status=$request->status;

        $sid=Session::get('sid');

        $image_save->sid=$sid;

        $image_save->save();

        return redirect()->back()->with('success', 'Photos has been added in Web Gallery....');  
    }



    public function distory($id)
    {
        $school = Gallery_Model::where('id',$id)->first();
        $school->delete();
        return redirect()->back()->with('warning', 'Photos Record has been Deleted....');   
    }
}
