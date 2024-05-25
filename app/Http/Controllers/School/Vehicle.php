<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle_Model;
use App\Models\Routes_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class Vehicle extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $routes=Routes_Model::all()->where('sid', $sid)->where('year',$data->year);
        $data2=Vehicle_Model::all()->where('sid', $sid)->where('year',$data->year);
        return view('school.vehicle', ['data'=>$data,'data2'=>$data2,'routes'=>$routes]);
    }


    public function create(Request $request)
    {
        $request->validate([
        
         'vehicle_name'=> 'required | max : 200', 
      
         'amount'=> 'required | max : 200',  
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Vehicle_Model;

       $data->vehicle_name=$request->vehicle_name;
       $data->vehicle_type=$request->vehicle_type;
        $data->routes=$request->routes;
        $data->amount=$request->amount;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Vehicle Records has been successfully added....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $routes=Routes_Model::all()->where('sid', $sid);
        $data2 = Vehicle_Model::where('id',$id)->first();
        return view('school.vehicle_edit', ['data'=>$data,'data2'=>$data2,'routes'=>$routes]);

    }


    public function update(Request $request, $id)
    {

        
        $request->validate([
            'vehicle_name'=> 'required | max : 200',   
            'amount'=> 'required | max : 200',  
           ]);
   
          
        $data = Vehicle_Model::where('id',$id)->first();

        $data->vehicle_name=$request->vehicle_name;
        $data->vehicle_type=$request->vehicle_type;
         $data->routes=$request->routes;
         $data->amount=$request->amount;


        $data->save();
        return redirect()->back()->with('success', 'Vehicle Records has been updated....');      
      
    }


    public function distory($id)
    {
        $data = Vehicle_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Vehicle Records has been Deleted....');   
    }
}
