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


class Enquiry extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        $data_student = Student_Model::all()->where('sid',$sid)->where('year',$data->year)->where('status',"0");
  
        return view('school.enquiry', ['data'=>$data,'data_student'=>$data_student,'data_class'=>$data_class,]);
    }

}
