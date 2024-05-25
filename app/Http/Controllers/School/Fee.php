<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fee_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class Fee extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Fee_Model::all()->where('sid', $sid)->where('year',$data->year);
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.fee', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }


    public function create(Request $request)
    {
        $request->validate([
         'fee_type'=> 'required | max : 200',  
         'amount'=> 'required | max : 200',  
         'due_date'=> 'required | max : 200',   
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Fee_Model;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->fee_type=$request->fee_type;
        $data->amount=$request->amount;
        $data->ddate=$request->due_date;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Fee Records has been successfully added....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Fee_Model::where('id',$id)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.fee_edit', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);

    }


    public function update(Request $request, $id)
    {

        
        $request->validate([
            'fee_type'=> 'required | max : 200',  
            'amount'=> 'required | max : 200',  
            'due_date'=> 'required | max : 200',   
           ]);
   
          
        $data = Fee_Model::where('id',$id)->first();
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->fee_type=$request->fee_type;
        $data->amount=$request->amount;
        $data->ddate=$request->due_date;

        $data->save();
        return redirect()->back()->with('success', 'Fee Details has been updated....');      
      
    }


    public function distory($id)
    {
        $data = Fee_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Fee Records has been Deleted....');   
    }
}
