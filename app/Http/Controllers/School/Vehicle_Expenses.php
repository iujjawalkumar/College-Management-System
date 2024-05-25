<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle_Expenses_Model;
use App\Models\School_Model;
use App\Models\Employee_Model;
use App\Models\Class_section_Model;
use Session;

class Vehicle_Expenses extends Controller
{
    public function index($vid, $did)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Vehicle_Expenses_Model::all()->where('vehicle_id', $vid)->where('year',$data->year);
        return view('school.vehicle_expenses', ['data'=>$data,'data2'=>$data2,'vid'=>$vid,'did'=>$did]);
    }


    public function create(Request $request)
    {
       

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Vehicle_Expenses_Model;

        $data->from_reading=$request->from_reading;
        $data->to_reading=$request->to_reading;
        $data->reading=$request->reading;
        $data->vehicle_id=$request->vid;
        $data->driver_id=$request->did;
        $data->fuel=$request->fuel;
        $data->rent=$request->rent;
        $data->repair=$request->repair;
        $data->ddate=$request->date;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Vehicle Expense Records has been successfully added....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Vehicle_Expenses_Model::where('id',$id)->first();
        return view('school.vehicle_expenses_edit', ['data'=>$data,'data2'=>$data2]);

    }


    public function update(Request $request, $id)
    {

                  
        $data = Vehicle_Expenses_Model::where('id',$id)->first();

        $data->from_reading=$request->from_reading;
        $data->to_reading=$request->to_reading;
        $data->reading=$request->reading;
        $data->fuel=$request->fuel;
        $data->rent=$request->rent;
        $data->repair=$request->repair;
        $data->ddate=$request->date;

        $data->save();
        return redirect()->back()->with('success', 'Vehicle Expense Records has been updated....');      
      
    }


    public function distory($id)
    {
        $data = Vehicle_Expenses_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Vehicle Expense Records has been Deleted....');   
    }


    public function vehicle_report()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

    
        $data_emp = Employee_Model::all()->where('desi','Driver')->where('sid',$sid);
        return view('school.vehicle_report', ['data'=>$data,'data_emp'=>$data_emp]);
    }

    public function get_vehicle_report(Request $request)
    {
       
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        
        $from_date=$request->from_date;
        $to_date=$request->to_date;
        $emp=$request->emp;

        \DB::statement("SET SQL_MODE=''");

        if($emp=="All")
        {
            $vehicle_data=Vehicle_Expenses_Model::whereBetween('created_at', [$from_date, $to_date])->where('year',$data->year)->where('sid', $sid)->get();
      
          }
        else
        {
            $vehicle_data=Vehicle_Expenses_Model::whereBetween('created_at', [$from_date, $to_date])->where('driver_id', $emp)->where('year',$data->year)->where('sid', $sid)->get();
        }

          

        return view('school.print_vehicle_report', ['data'=>$data,'vehicle_data'=>$vehicle_data,'from_date'=>$from_date,'to_date'=>$to_date,'emp'=>$emp]);

      
    }
}
