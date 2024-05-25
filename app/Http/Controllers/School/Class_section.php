<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Class_section_Model;
use App\Models\Section_Model;
use App\Models\School_Model;
use Session;

class Class_section extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Class_section_Model::all()->where('sid', $sid);
        return view('school.class_section', ['data'=>$data,'data2'=>$data2]);
    }

    public function create_class(Request $request)
    {
        $request->validate([
         'name'=> 'required | max : 20'   
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();

       $data = new Class_section_Model;
        $data->name=$request->name;
        $data->year=$data2->year;
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Class has been created....');   
    }


    public function create_section(Request $request)
    {
        $request->validate([
         'cclass'=> 'required | max : 50',
         'section'=> 'required | max : 50',

        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Section_Model;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->sid=$sid;
        $data->year=$data2->year;
        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Section of the Class has been created....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Notice_Model::where('id',$id)->first();
      return view('school.notice_edit', ['data'=>$data,'data2'=>$data2,]);
    }


    public function view_section($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Section_Model::all()->where('cclass',$id);
      return view('school.view_section', ['data'=>$data,'data2'=>$data2]);
    }


    public function update(Request $request, $id)
    {

        $data = Notice_Model::where('id',$id)->first();
        $data->title=$request->title;
        $data->save();
        return redirect()->back()->with('success', 'Notification has been updated....');   
    }


    public function distory($id)
    {
        $data = Class_section_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Class Records has been Deleted....');   
    }

    public function distory_section($id)
    {
        $data = Section_Model::where('id',$id)->first();
      $data->delete();
       return redirect()->back()->with('warning', 'Section Records has been Deleted....');   
    }
}
