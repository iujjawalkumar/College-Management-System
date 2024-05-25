<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School_Model;
use App\Models\Holiday_Model;
use Session;

class Holiday_List extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Holiday_Model::all()->where('sid',$sid)->where('year',$data->year);
        return view('school.holiday', ['data'=>$data,'data2'=>$data2]);
    }

  
    public function create(Request $request)
    {
        $request->validate([
         'title'=> 'required | max : 200'   
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Holiday_Model;
        $data->title=$request->title;
        $data->ddate=$request->ddate;
        $data->year=$data2->year;
 
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Holiday Record has been Added....');   
    }




    public function distory($id)
    {
        $data = Holiday_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Holiday Record has been Deleted....');   
    }
}
