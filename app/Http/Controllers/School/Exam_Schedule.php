<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School_Model;
use App\Models\Exam_Schedule_Model;
use App\Models\Class_section_Model;
use Session;

class Exam_Schedule extends Controller
{
    public function index($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Exam_Schedule_Model::all()->where('year',$data->year)->where('exam_id',$id);
        $data_class = Class_section_Model::all()->where('sid',$sid);
        return view('school.exam_schedule', ['data'=>$data,'data2'=>$data2,'exam_id'=>$id,'data_class'=>$data_class]);
    }


    public function view($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Exam_Schedule_Model::all()->where('exam_id',$id)->where('year',$data->year);
        $data_class = Class_section_Model::all()->where('sid',$sid);
        return view('school.view_schedule', ['data'=>$data,'data2'=>$data2,'exam_id'=>$id,'data_class'=>$data_class]);
    }

  
    public function create(Request $request)
    {
       
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Exam_Schedule_Model;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->subject=$request->subject;
        $data->exam_id=$request->exam_id;
        $data->ddate=$request->ddate;
        $data->year=$data2->year;
 
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Exam Schedule Record has been Added....');   
    }




    public function distory($id)
    {
        $data = Exam_Schedule_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Exam Scheduled Record has been Deleted....');   
    }
}
