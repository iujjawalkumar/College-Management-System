<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject_Model;
use App\Models\Class_section_Model;
use App\Models\School_Model;
use App\Models\Student_Model;
use App\Models\Section_Model;
use App\Models\Class_Time_Table_Model;
use App\Models\Fee_Model;
use App\Models\Employee_Model;
use Session;

class Class_Time_Table extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        $data_class_time = Class_Time_Table_Model::all()->where('sid',$sid)->where('year',$data->year);
        $teacher = Employee_Model::all()->where('sid',$sid);
        return view('school.class_time_table', ['data'=>$data,'data_class_time'=>$data_class_time,'data_class'=>$data_class,'teacher'=>$teacher]);
    }

    public function fetchSubject(Request $request)
    {
        $data['section'] = Subject_Model::where("section", $request->section_id)
                                ->get(["subject", "id"]);
  
        return response()->json($data);
    }

    public function fetchStudent(Request $request)
    {
        
        $data['student'] = Student_Model::where("section", $request->section_id)
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
       $data = new Class_Time_Table_Model;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->subject=$request->subject;
        $data->teacher=$request->teacher;
        $data->period=$request->period;
        $data->year=$data2->year;
 
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Teacher & Period has been assign....');   
    }


   
    public function distory($id)
    {
        $data = Class_Time_Table_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Record has been Deleted....');   
    }
}
