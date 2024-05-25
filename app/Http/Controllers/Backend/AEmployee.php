<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee_Model;
use App\Models\Employee_Salary_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class AEmployee extends Controller
{
    public function index()
    {
        $sid="0";
        $data = School_Model::where('id', $sid)->first();

        $data2=Employee_Model::all()->where('sid', $sid);
        //$data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('admin.addemployee', ['data'=>$data,'data2'=>$data2]);
    }


    public function view()
    {
        $sid="0";
        $data = School_Model::where('id', $sid)->first();

        $data2=Employee_Model::all()->where('sid',$sid);
        
        return view('admin.viewemployee', ['data'=>$data,'data2'=>$data2]);
    }


    public function view_exp()
    {
        $sid="0";
        $data = School_Model::where('id', $sid)->first();

        $data2=Employee_Model::all()->where('sid',$sid);
        
        return view('admin.view_employee', ['data'=>$data,'data2'=>$data2]);
    }


    public function view_salary()
    {
        $sid="0";
        $data = School_Model::where('id', $sid)->first();

        $data2=Employee_Model::all()->where('sid',$sid);
       
        return view('admin.view_employees', ['data'=>$data,'data2'=>$data2]);
    }



    public function offer_letter($id)
    {
        $sid="0";
        $data = School_Model::where('id', $sid)->first();

        $data2 = Employee_Model::where('id',$id)->first();
        $data3 = Employee_Salary_Model::where('emp_id',$id)->first();
        
        return view('admin.offer_letter', ['data'=>$data,'data2'=>$data2,'data3'=>$data3]);
    }

    public function exp_letter($id)
    {
        $sid="0";
        $data = School_Model::where('id', $sid)->first();

        $data2 = Employee_Model::where('id',$id)->first();
        $data3 = Employee_Salary_Model::where('emp_id',$id)->first();
        
        return view('admin.exp_letter', ['data'=>$data,'data2'=>$data2,'data3'=>$data3]);
    }



    public function create(Request $request)
    {
        $request->validate([
         'name'=> 'required | max : 200',  
         'uid'=> 'required | max : 200',  
         'mob'=> 'required | max : 200',   
        ]);
        $year="NA";
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Employee_Model;
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
        $data->password=\Hash::make($request->mob);
 

        $data->sid="0";
        $data->year=$year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Employee Records has been successfully Created....');   
    }


    public function edit($id)
    {
        $sid="0";
        $data = School_Model::where('id', $sid)->first();

        $data2 = Employee_Model::where('id',$id)->first();
     
        return view('admin.employee_edit', ['data'=>$data,'data2'=>$data2]);

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
        $data = Employee_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Employee Records has been Deleted....');   
    }
}
