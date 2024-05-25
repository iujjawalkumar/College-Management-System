<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School_Model;
use App\Models\Exam_Schedule_Model;
use App\Models\Exam_Result_Model;
use App\Models\Student_Model;
use Session;

class Exam_Result extends Controller
{
    public function index($id,$eid)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Exam_Result_Model::all()->where('stu_id',$id)->where('exam_id',$eid)->where('year',$data->year);
        $data3 = Student_Model::where('id',$id)->first();
        $exam=Exam_Schedule_Model::orderBy('ddate', 'ASC')->where('year',$data->year)->where('exam_id',$eid)->where('cclass',$data3->cclass)->where('section',$data3->section)->get();
        return view('school.add_exam_result', ['data'=>$data,'data2'=>$data2,'data3'=>$data3,'exam_id'=>$eid,'stu_id'=>$id,'exam'=>$exam]);
    }


    public function view($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Exam_Result_Model::all()->where('year',$data->year)->where('exam_id',$id);
        $data_class = Class_Section_Model::all()->where('sid',$sid)->where('year',$data->year);
        return view('school.view_schedule', ['data'=>$data,'data2'=>$data2,'exam_id'=>$id,'data_class'=>$data_class]);
    }

  
    public function create(Request $request, $id, $eid)
    {
        $request->validate([
            'maximum_marks'=> 'required | max : 50',   
            'obtain_marks'=> 'required | max : 50',   
    
           
           ]);
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();

        if(Exam_Result_Model::where('stu_id', $id)->where('exam_id', $eid)->where('year',$data->year)->where('sub_id', $request->sub_id)->first())
        {
            return redirect()->back()->with('warning', 'This Subject Marks is Already Updated....');  
        }
        else
        {

 
       $data = new Exam_Result_Model;
        $data->sub_id=$request->sub_id;
        $data->om=$request->obtain_marks;
        $data->mm=$request->maximum_marks;
        $data->exam_id=$eid;
        $data->stu_id=$id;
   
        $data->year=$data2->year;
 
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Exam Result Record has been Added....');  
        } 
    }




    public function distory($id)
    {
        $data = Exam_Result_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Exam Result Record has been Deleted....');   
    }
}
