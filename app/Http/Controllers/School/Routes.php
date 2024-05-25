<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Routes_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class Routes extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Routes_Model::all()->where('sid', $sid)->where('year',$data->year);
        return view('school.routes', ['data'=>$data,'data2'=>$data2]);
    }


    public function create(Request $request)
    {
        $request->validate([
         'route_name'=> 'required | max : 200',   
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Routes_Model;

        $data->route_name=$request->route_name;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Vehicle Routes Records has been successfully added....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Routes_Model::where('id',$id)->first();
        return view('school.routes_edit', ['data'=>$data,'data2'=>$data2]);

    }


    public function update(Request $request, $id)
    {

        
        $request->validate([
            'route_name'=> 'required | max : 200',   
           ]);
   
          
        $data = Routes_Model::where('id',$id)->first();
        $data->route_name=$request->route_name;


        $data->save();
        return redirect()->back()->with('success', 'Vehicle Routes Records has been updated....');      
      
    }


    public function distory($id)
    {
        $data = Routes_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Routes Records has been Deleted....');   
    }
}
