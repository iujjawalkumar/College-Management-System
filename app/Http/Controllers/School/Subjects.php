<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject_Model;
use App\Models\Class_section_Model;
use App\Models\School_Model;
use App\Models\Student_Model;
use App\Models\Section_Model;
use App\Models\Fee_Model;
use Session;

class Subjects extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Subject_Model::all()->where('sid',$sid);
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.subjects', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }

    public function fetchSection(Request $request)
    {
        $data['section'] = Section_Model::where("cclass", $request->class_id)
                                ->get(["section", "id"]);
  
        return response()->json($data);
    }

    public function fetchStudent(Request $request)
    {   $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data['student'] = Student_Model::where("section", $request->section_id)->where('year',$data->year)->where('status',"1")
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }

    public function fetchFee(Request $request)
    {
        
        $data['fee'] = Fee_Model::where("id", $request->fee_id)
                                ->get(["amount","ddate","id"]);
  
        return response()->json($data);
    }


    public function create(Request $request)
    {
        $request->validate([
         'subject'=> 'required | max : 200'   
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Subject_Model;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->subject=$request->subject;
        $data->year=$data2->year;
 
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Subject has been Added....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Notice_Model::where('id',$id)->first();
      return view('school.notice_edit', ['data'=>$data,'data2'=>$data2,]);
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
        $data = Subject_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Subject Record has been Deleted....');   
    }
}
