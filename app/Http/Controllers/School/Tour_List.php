<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School_Model;
use App\Models\Tour_Model;
use Session;

class Tour_List extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Tour_Model::all()->where('sid',$sid)->where('year',$data->year);
        return view('school.tour', ['data'=>$data,'data2'=>$data2]);
    }

  
    public function create(Request $request)
    {
        $request->validate([
         'title'=> 'required | max : 200'   
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Tour_Model;
        $data->title=$request->title;
        $data->ddate=$request->ddate;
        $data->year=$data2->year;
 
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Tour Record has been Added....');   
    }




    public function distory($id)
    {
        $data = Tour_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Tour Record has been Deleted....');   
    }
}
