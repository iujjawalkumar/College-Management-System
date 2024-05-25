<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee_Model;
use App\Models\Employee_Salary_Model;
use App\Models\School_Model;
use App\Models\Salary_Model;
use App\Models\Class_section_Model;
use Session;

class Salary extends Controller
{
    public function index($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Employee_Model::where('id',$id)->first();
        $emp_salary = Employee_Salary_Model::where('emp_id',$id)->first();
        $salary=Salary_Model::all()->where('emp_id',$id)->where('year',$data->year);
     
        return view('school.pay_salary', ['data'=>$data,'data2'=>$data2,'salary'=>$salary,'emp_salary'=>$emp_salary]);
    }

    public function update(Request $request, $id)
    {
        
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
        $data = new Salary_Model;
        $data->year=$data2->year;
        $data->sid=$sid;

        $data->emp_id=$request->emp_id;
        $data->date=$request->date;
        $data->mode=$request->mode;
        $data->salary=$request->salary;
   
        $data->save();
        return redirect()->back()->with('success', 'Salary has been Paid Successfully....');   
    }

    

    public function view($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Employee_Model::where('id',$id)->first();
        $data3 = Employee_Salary_Model::where('emp_id',$id)->first();
        $data4 = Salary_Model::all()->where('emp_id',$id)->where('year',$data->year);

        return view('school.pay_salary_slip', ['data'=>$data,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
    }



    public function distory($id)
    {
        $data = Salary_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Salary Records has been Deleted....');   
    }

    

    public function salary_report()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

    
      
        return view('school.salary_report', ['data'=>$data]);
    }

    public function get_salary_report(Request $request)
    {
       
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        
        $from_date=$request->from_date;
        $to_date=$request->to_date;

        \DB::statement("SET SQL_MODE=''");
            $salary_data=Salary_Model::whereBetween('created_at', [$from_date, $to_date])->where('sid', $sid)->where('year',$data->year)->get();
      

        return view('school.print_salary_report', ['data'=>$data,'salary_data'=>$salary_data,'from_date'=>$from_date,'to_date'=>$to_date]);

      
    }
}
