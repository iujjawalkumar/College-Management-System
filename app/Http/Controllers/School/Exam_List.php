<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School_Model;
use App\Models\Exam_List_Model;
use Session;

class Exam_List extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Exam_List_Model::all()->where('sid',$sid)->where('year',$data->year);
        return view('school.exam', ['data'=>$data,'data2'=>$data2]);
    }


    public function view()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Exam_List_Model::all()->where('sid',$sid)->where('year',$data->year);
        return view('school.view_exam', ['data'=>$data,'data2'=>$data2]);
    }


  
    public function create(Request $request)
    {
        $request->validate([
         'title'=> 'required | max : 200'   
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Exam_List_Model;
        $data->title=$request->title;
        $data->year=$data2->year;
 
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Exam Record has been Created....');   
    }




    public function distory($id)
    {
        $data = Exam_List_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Exam Record has been Deleted....');   
    }
}
