<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_Vehicle_Model;
use App\Models\Student_Model;
use App\Models\Vehicle_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class Student_Vehicle extends Controller
{


    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $vehicle=Vehicle_Model::all()->where('sid', $sid)->where('year',$data->year);
        $data2=Student_Vehicle_Model::all()->where('sid', $sid)->where('year',$data->year);
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.student_vehicle', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class,'vehicle'=>$vehicle]);
    }



    public function create(Request $request)
    {
      
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
        $stu_id=$request->student_id;
       
       if(Student_Vehicle_Model::where('student_id', $stu_id)->first())
       {
        return redirect()->back()->with('warning', 'This Records is already Assign....');   
       }
       else
       {

        $data = new Student_Vehicle_Model;
        $data->class_id=$request->cclass;
        $data->section_id=$request->section;
        $data->student_id=$request->student_id;
        $data->vehicle_id=$request->vehicle_id;


        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Vehicle Assign successfully....');   

       }
    }


   


    public function distory($id)
    {
        $data = Student_Vehicle_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Records has been Deleted....');   
    }
}
