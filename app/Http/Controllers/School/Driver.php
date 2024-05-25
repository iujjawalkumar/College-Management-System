<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver_Model;
use App\Models\Vehicle_Model;
use App\Models\School_Model;
use App\Models\Employee_Model;
use Session;

class Driver extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $vehicle=Vehicle_Model::all()->where('sid', $sid)->where('year',$data->year);
        $data2=Driver_Model::all()->where('sid', $sid)->where('year',$data->year);
        $emp=Employee_Model::all()->where('sid', $sid)->where('desi', 'Driver');
        return view('school.driver', ['data'=>$data,'data2'=>$data2,'vehicle'=>$vehicle,'emp'=>$emp]);
    }


    public function view_driver()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $vehicle=Vehicle_Model::all()->where('sid', $sid)->where('year',$data->year);
        $data2=Driver_Model::all()->where('sid', $sid)->where('year',$data->year);
        $emp=Employee_Model::all()->where('sid', $sid)->where('desi', 'Driver');
        return view('school.view_driver', ['data'=>$data,'data2'=>$data2,'vehicle'=>$vehicle,'emp'=>$emp]);
    }


    public function create(Request $request)
    {
      
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Driver_Model;

       $data->vehicle_id=$request->vehicle_id;
       $data->driver_id=$request->driver_id;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Vehicle has been successfully assign to Driver....');   
    }


 


    public function distory($id)
    {
        $data = Driver_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Assign Vehicle Records has been Deleted....');   
    }
}
