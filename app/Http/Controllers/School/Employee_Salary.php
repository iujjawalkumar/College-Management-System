<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee_Salary_Model;
use App\Models\Employee_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class Employee_Salary extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Employee_Model::all()->where('sid', $sid);
        return view('school.employee_salary', ['data'=>$data,'data2'=>$data2]);
    }


    public function view($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Employee_Salary_Model::all()->where('emp_id',$id);
        
        return view('school.viewemployee_salary', ['data'=>$data,'data2'=>$data2]);
    }


    public function create(Request $request)
    {
        $request->validate([
         'emp_id'=> 'required | max : 200',  
         'basic'=> 'required | max : 200' 
           
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();

        if(Employee_Salary_Model::where('emp_id', $request->emp_id)->first())
        {
         return redirect()->back()->with('warning', 'This Employee Salary Records is already Exist....');   
        }
        else
        {
 
       $data = new Employee_Salary_Model;
        $data->emp_id=$request->emp_id;
        $data->basic=$request->basic;
        $data->da=$request->da;
        $data->hra=$request->hra;
        $data->ca=$request->ca;
        $data->ma=$request->ma;
        $data->sa=$request->sa;

        $total=$request->basic+$request->da+$request->hra+$request->ca+$request->ma+$request->sa;
        $data->total=$total;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Employee Salary Records has been successfully Created....');   
    }
}


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Employee_Model::where('id',$id)->first();
     
        return view('school.employee_edit', ['data'=>$data,'data2'=>$data2]);

    }


    public function update(Request $request, $id)
    {

        
           $request->validate([
            'name'=> 'required | max : 200',  
            'uid'=> 'required | max : 200',  
            'mob'=> 'required | max : 200',   
           ]);
          
        $data = Employee_Model::where('id',$id)->first();
        $data->name=$request->name;
        $data->qualification=$request->qualification;
        $data->exp=$request->exp;
        $data->doj=$request->doj;
        $data->dob=$request->dob;
        $data->address=$request->address;
        $data->email=$request->email;
        $data->mob=$request->mob;
        $data->ifsc=$request->ifsc;
        $data->accno=$request->accno;
        $data->desi=$request->desi;
        $data->uid=$request->uid;
        $data->pan=$request->pan;

        $data->save();
        return redirect()->back()->with('success', 'Employee Details has been updated....');      
      
    }


    public function distory($id)
    {
        $data = Employee_Salary_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Employee Salary Records has been Deleted....');   
    }


}
