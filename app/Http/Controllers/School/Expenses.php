<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class Expenses extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Expenses_Model::all()->where('sid', $sid)->where('year',$data->year);
        return view('school.expenses', ['data'=>$data,'data2'=>$data2]);
    }


    public function create(Request $request)
    {
        $request->validate([
         'expense_type'=> 'required | max : 200',  
         'amount'=> 'required | max : 200',  
         'date'=> 'required | max : 200',   
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Expenses_Model;

        $data->expense_type=$request->expense_type;
        $data->amount=$request->amount;
        $data->category=$request->category;
        $data->ddate=$request->date;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'General Expense Records has been successfully added....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Expenses_Model::where('id',$id)->first();
        return view('school.expense_edit', ['data'=>$data,'data2'=>$data2]);

    }


    public function update(Request $request, $id)
    {

        
        $request->validate([
            'expense_type'=> 'required | max : 200',  
            'amount'=> 'required | max : 200',  
            'date'=> 'required | max : 200',   
           ]);
   
          
        $data = Expenses_Model::where('id',$id)->first();
        $data->expense_type=$request->expense_type;
        $data->amount=$request->amount;
        $data->category=$request->category;
        $data->ddate=$request->date;

        $data->save();
        return redirect()->back()->with('success', 'Expense Records has been updated....');      
      
    }


    public function distory($id)
    {
        $data = Expenses_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Expense Records has been Deleted....');   
    }

    public function expenses_report()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

    
      
        return view('school.expenses_report', ['data'=>$data]);
    }

    public function get_expenses_report(Request $request)
    {
       
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        
        $from_date=$request->from_date;
        $to_date=$request->to_date;

        \DB::statement("SET SQL_MODE=''");
            $exp_data=Expenses_Model::whereBetween('created_at', [$from_date, $to_date])->where('sid', $sid)->where('year',$data->year)->get();
      

        return view('school.print_expenses_report', ['data'=>$data,'exp_data'=>$exp_data,'from_date'=>$from_date,'to_date'=>$to_date]);

      
    }

}
