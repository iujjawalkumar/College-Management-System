<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Custom_page_Model;
use App\Models\School_Model;
use Session;

class Custom_page extends Controller
{
    public function index()
    {
       
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Custom_page_Model::where('sid', $sid)->latest()->paginate();
        return view('school.addpage', ['data'=>$data,'data2'=>$data2]);
      
    }

    public function view()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Custom_page_Model::where('sid', $sid)->latest()->paginate();
        return view('school.viewpage', ['data'=>$data,'data2'=>$data2]);
    }

    public function create(Request $request)
    {
       
        $request->validate([
          
            'name'=> 'required',  
            'page_menu'=> 'required',  
            'des'=> 'required',  
           
           ]);

        $data_save = new Custom_page_Model;

        $data_save->name=$request->name;
        $data_save->page_menu=$request->page_menu;
        $data_save->des=$request->des;

        $sid=Session::get('sid');

        $data_save->sid=$sid;

        $data_save->save();

        return redirect()->back()->with('success', 'Website Page has been Successfully Created....');  
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Custom_page_Model::where('id',$id)->first();
      return view('school.edit_page', ['data'=>$data,'data2'=>$data2,]);
    }


    public function update(Request $request, $id)
    {

        $data = Custom_page_Model::where('id',$id)->first();
        $data->name=$request->name;
        $data->des=$request->des;
        $data->save();
        return redirect()->back()->with('success', 'Page Records has been updated....');   
    }


    public function distory($id)
    {
        $school = Custom_page_Model::where('id',$id)->first();
        $school->delete();
        return redirect()->back()->with('warning', 'Page has been Deleted....');   
    }
}
