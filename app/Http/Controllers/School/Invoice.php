<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice_Model;
use App\Models\Student_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use App\Models\Fee_Model;
use App\Models\Fees_Model;
use App\Models\Vehicle_Model;
use App\Models\Transaction_Model;
use App\Models\Expenses_Model;
use App\Models\Vehicle_Expenses_Model;
use App\Models\Salary_Model;
use App\Models\Student_Vehicle_Model;
//use Illuminate\Support\Carbon;
use Session;

class Invoice extends Controller
{

    
    public function balancesheet()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $year=$data->year;
        $salary = Salary_Model::all()->where('sid',$sid)->where('year',$year);
        $transaction = Transaction_Model::all()->where('sid',$sid)->where('year',$year);
        $fees = Fees_Model::all()->where('sid',$sid)->where('year',$year);
        $expenses = Expenses_Model::all()->where('sid',$sid)->where('year',$year);
        $vexpenses = Vehicle_Expenses_Model::all()->where('sid',$sid)->where('year',$year);
        return view('school.balancesheet', ['data'=>$data,'salary'=>$salary,'transaction'=>$transaction,'expenses'=>$expenses,'fees'=>$fees,'vexpenses'=>$vexpenses]);
    }


    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Student_Model::all()->where('sid', $sid)->where('year',$data->year)->where('status',"1");
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.student_list', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }


    public function fee_report()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Student_Model::all()->where('sid', $sid)->where('year',$data->year)->where('status',"1");
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.fee_report', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }


    public function get_fee_report(Request $request)
    {
       
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        //$data_stu = Student_Model::where('id',$id)->first();
        
        $from_date=$request->from_date;
        $to_date=$request->to_date;

        //$to_date = Carbon::createFromFormat('Y.m.d', $todate);
       // $daysToAdd = 1;
        //$to_date = $to_date->addDays($daysToAdd);
        $cclass=$request->cclass;
        $section=$request->section;

        \DB::statement("SET SQL_MODE=''");
        


        if($cclass=="All" and $section=="All")
        {
            $fee_data=Transaction_Model::whereBetween('created_at', [$from_date, $to_date])->where('sid', $sid)->where('year',$data->year)->get();
        }

        if($cclass!="All" and $section=="All")
        {
            $fee_data = Transaction_Model::join('student__models', 'student__models.id', '=', 'transaction__models.stu_id')
            ->where('student__models.cclass', $cclass)
            ->where('transaction__models.year',$data->year)
            ->whereBetween('transaction__models.created_at', [$from_date, $to_date])
            ->get(['transaction__models.*']);
               }
          
        if($cclass!="All" and $section!="All")
        {
            $fee_data = Transaction_Model::join('student__models', 'student__models.id', '=', 'transaction__models.stu_id')
            ->where('student__models.cclass', $cclass)
            ->where('student__models.section', $section)
            ->where('transaction__models.year',$data->year)
            ->whereBetween('transaction__models.created_at', [$from_date, $to_date])
            ->get(['transaction__models.*']);
                 }
          

                 $exp_data=Expenses_Model::whereBetween('created_at', [$from_date, $to_date])->where('sid', $sid)->where('year',$data->year)->sum('amount');
                 $fuel=Vehicle_Expenses_Model::whereBetween('created_at', [$from_date, $to_date])->where('year',$data->year)->where('sid', $sid)->sum('fuel');
                 $rent=Vehicle_Expenses_Model::whereBetween('created_at', [$from_date, $to_date])->where('year',$data->year)->where('sid', $sid)->sum('rent');
                 $repair=Vehicle_Expenses_Model::whereBetween('created_at', [$from_date, $to_date])->where('year',$data->year)->where('sid', $sid)->sum('repair');

     //$fee_data=Transaction_Model::whereBetween('created_at', [$from_date, $to_date])->where('sid', $sid)->get();
         

        return view('school.print_fee_report', ['fuel'=>$fuel,'rent'=>$rent,'repair'=>$repair,'exp_data'=>$exp_data, 'data'=>$data,'fee_data'=>$fee_data,'cclass'=>$cclass,'section'=>$section,'from_date'=>$from_date,'to_date'=>$to_date]);

      
    }


    public function get_fee_details($stu_id)
    {
       
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data_stu = Student_Model::where('id',$stu_id)->first();
        $data_fees = Fees_Model::orderBy('created_at', 'ASC')->where('stu_id',$stu_id)->get();
        $data_transaction = Transaction_Model::orderBy('created_at', 'ASC')->where('stu_id',$stu_id)->get();
  
        return view('school.print_fee_details', ['data'=>$data,'data_fees'=>$data_fees,'data_transaction'=>$data_transaction,'data_stu'=>$data_stu]);

      
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

    public function enquiry(Request $request)
    {
       
        $id=$request->student_id;
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data_stu = Student_Model::where('id',$id)->first();
      
     
        $data_vehicle = Student_Vehicle_Model::where('student_id',$id)->first();
        if(!$data_vehicle)
        {
         $data_vehicle = School_Model::where('id',1)->first();
        }

        //$stu_vehicle = Student_Vehicle_Model::where('student_id',$id)->first();

        $fee_data=Fees_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();

        //$vehicle_data=Vehicle_Model::all()->orderBy('id', 'DESC')->get();
  

        $transaction_data=Transaction_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();

        $amount=Fees_Model::where('stu_id', $id)->sum('amount');

        $deposit=Transaction_Model::where('stu_id', $id)->sum('final_amount');
        $dis=Transaction_Model::where('stu_id', $id)->sum('discount');

        $fee_total=$amount-$deposit-$dis;
      
       $search=$data_stu->section;
       $data_fee = Fee_Model::select("*")
       ->where('cclass', '=', $data_stu->cclass)->where('year',$data->year)
       ->where(function($query) use ($search){
           $query->where('section', 'LIKE', '%'.$search.'%')
                 ->orWhere('section', 'LIKE', 'all');
       })
       ->get();
       
           return view('school.create_invoice', ['data_vehicle'=>$data_vehicle,'data'=>$data,'data_stu'=>$data_stu,'data_fee'=>$data_fee,'fee_data'=>$fee_data,'fee_total'=>$fee_total,'transaction_data'=> $transaction_data]);

    }

    public function create_invoice(Request $request)
    {
       
        $id=$request->student_id;
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data_stu = Student_Model::where('id',$id)->first();
      
     
        $data_vehicle = Student_Vehicle_Model::where('student_id',$id)->first();
        if(!$data_vehicle)
        {
         $data_vehicle = School_Model::where('id',1)->first();
        }

        //$stu_vehicle = Student_Vehicle_Model::where('student_id',$id)->first();

        $fee_data=Fees_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();

        //$vehicle_data=Vehicle_Model::all()->orderBy('id', 'DESC')->get();
  

        $transaction_data=Transaction_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();

        $amount=Fees_Model::where('stu_id', $id)->sum('amount');

        $deposit=Transaction_Model::where('stu_id', $id)->sum('final_amount');
        $dis=Transaction_Model::where('stu_id', $id)->sum('discount');

        $fee_total=$amount-$deposit-$dis;
      
       $search=$data_stu->section;
       $data_fee = Fee_Model::select("*")
       ->where('cclass', '=', $data_stu->cclass)->where('year',$data->year)
       ->where(function($query) use ($search){
           $query->where('section', 'LIKE', '%'.$search.'%')
                 ->orWhere('section', 'LIKE', 'all');
       })
       ->get();
       
           return view('school.create_invoice', ['data_vehicle'=>$data_vehicle,'data'=>$data,'data_stu'=>$data_stu,'data_fee'=>$data_fee,'fee_data'=>$fee_data,'fee_total'=>$fee_total,'transaction_data'=> $transaction_data]);

    }


    public function create_invoice2($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data_stu = Student_Model::where('id',$id)->first();

        
   
            $data_vehicle = Student_Vehicle_Model::where('student_id',$id)->first();
       if(!$data_vehicle)
       {
        $data_vehicle = School_Model::where('id',1)->first();
       }
        
        $fee_data=Fees_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();
        $transaction_data=Transaction_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();

        $amount=Fees_Model::where('stu_id', $id)->sum('amount');

        $deposit=Transaction_Model::where('stu_id', $id)->sum('final_amount');
        $dis=Transaction_Model::where('stu_id', $id)->sum('discount');

        $fee_total=$amount-$deposit-$dis;
      
       $search=$data_stu->section;
       $data_fee = Fee_Model::select("*")
       ->where('cclass', '=', $data_stu->cclass)->where('year',$data->year)
       ->where(function($query) use ($search){
           $query->where('section', 'LIKE', '%'.$search.'%')
                 ->orWhere('section', 'LIKE', 'all');
       })
       ->get();
       
           return view('school.create_invoice', ['data_vehicle'=>$data_vehicle,'data'=>$data,'data_stu'=>$data_stu,'data_fee'=>$data_fee,'fee_data'=>$fee_data,'fee_total'=>$fee_total,'transaction_data'=> $transaction_data]);

    }


    public function print_invoice($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data_stu = Student_Model::where('id',$id)->first();

        $fee_data=Fees_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();
        $transaction_data=Transaction_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();

        $amount=Fees_Model::where('stu_id', $id)->sum('amount');

        $deposit=Transaction_Model::where('stu_id', $id)->sum('final_amount');
        $dis=Transaction_Model::where('stu_id', $id)->sum('discount');

        $fee_total=$amount-$deposit-$dis;
      
       $search=$data_stu->section;
       $data_fee = Fee_Model::select("*")
       ->where('cclass', '=', $data_stu->cclass)
       ->where(function($query) use ($search){
           $query->where('section', 'LIKE', '%'.$search.'%')
                 ->orWhere('section', 'LIKE', 'all');
       })
       ->get();
       
      
       return view('school.print_invoice', ['data'=>$data,'data_stu'=>$data_stu,'data_fee'=>$data_fee,'fee_data'=>$fee_data,'fee_total'=>$fee_total,'amount'=>$amount,'deposit'=>$deposit,'dis'=>$dis,'transaction_data'=> $transaction_data]);
      

    }

    public function print_invoice_today($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data_stu = Student_Model::where('id',$id)->first();

        $ddate = date('Y-m-d');

        $fee_data=Fees_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->orderBy('id', 'DESC')->get();
        $transaction_data=Transaction_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->orderBy('id', 'DESC')->get();

        $amount=Fees_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->sum('amount');

        $deposit=Transaction_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->sum('final_amount');
        $dis=Transaction_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->sum('discount');

        $fee_total=$amount-$deposit-$dis;
      
       $search=$data_stu->section;
       $data_fee = Fee_Model::select("*")
       ->where('cclass', '=', $data_stu->cclass)
       ->where(function($query) use ($search){
           $query->where('section', 'LIKE', '%'.$search.'%')
                 ->orWhere('section', 'LIKE', 'all');
       })
       ->get();
       
      
       return view('school.print_invoice', ['data'=>$data,'data_stu'=>$data_stu,'data_fee'=>$data_fee,'fee_data'=>$fee_data,'fee_total'=>$fee_total,'amount'=>$amount,'deposit'=>$deposit,'dis'=>$dis,'transaction_data'=> $transaction_data]);
      

    }


    public function mob_invoice($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data_stu = Student_Model::where('id',$id)->first();

        $fee_data=Fees_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();
        $transaction_data=Transaction_Model::where('stu_id', $id)->orderBy('id', 'DESC')->get();

        $amount=Fees_Model::where('stu_id', $id)->sum('amount');

        $deposit=Transaction_Model::where('stu_id', $id)->sum('final_amount');
        $dis=Transaction_Model::where('stu_id', $id)->sum('discount');

        $fee_total=$amount-$deposit-$dis;
      
       $search=$data_stu->section;
       $data_fee = Fee_Model::select("*")
       ->where('cclass', '=', $data_stu->cclass)
       ->where(function($query) use ($search){
           $query->where('section', 'LIKE', '%'.$search.'%')
                 ->orWhere('section', 'LIKE', 'all');
       })
       ->get();
       
      
       return view('school.print_invoice2', ['data'=>$data,'data_stu'=>$data_stu,'data_fee'=>$data_fee,'fee_data'=>$fee_data,'fee_total'=>$fee_total,'amount'=>$amount,'deposit'=>$deposit,'dis'=>$dis,'transaction_data'=> $transaction_data]);
      

    }


    public function mob_invoice_today($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $ddate = date('Y-m-d');
        $data_stu = Student_Model::where('id',$id)->first();

        $fee_data=Fees_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->orderBy('id', 'DESC')->get();
        $transaction_data=Transaction_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->orderBy('id', 'DESC')->get();

        $amount=Fees_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->sum('amount');

        $deposit=Transaction_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->sum('final_amount');
        $dis=Transaction_Model::where('stu_id', $id)->where('created_at','like', '%'.$ddate.'%')->sum('discount');

        $fee_total=$amount-$deposit-$dis;
      
       $search=$data_stu->section;
       $data_fee = Fee_Model::select("*")
       ->where('cclass', '=', $data_stu->cclass)
       ->where(function($query) use ($search){
           $query->where('section', 'LIKE', '%'.$search.'%')
                 ->orWhere('section', 'LIKE', 'all');
       })
       ->get();
       
      
       return view('school.print_invoice2', ['data'=>$data,'data_stu'=>$data_stu,'data_fee'=>$data_fee,'fee_data'=>$fee_data,'fee_total'=>$fee_total,'amount'=>$amount,'deposit'=>$deposit,'dis'=>$dis,'transaction_data'=> $transaction_data]);
      

    }


    public function addfees(Request $request)
    {
      
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Fees_Model;
        $data->stu_id=$request->stu_id;
        $data->amount=$request->fees_amount;
        $data->fee_type=$request->fee_type;
        $data->due_date=$request->due_date;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Fee Record has been added in Invoice....');   
    }
  
    public function add_transport_fee(Request $request, $tid, $stu_id)
    {
      
        $request->validate([
            
            'months' => 'required|min:1'
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();

        $da = Vehicle_Model::where('id', $tid)->first();

        $months="";
        $count_months=0;
        if(in_array('Apr', $request->get('months'))){
            $count_months++;
            $months=$months.'Apr | ';
            $count_months;
        }
        if(in_array('May', $request->get('months'))){
            $count_months++;
            $months=$months.'May | ';
            $count_months;
        }
        if(in_array('Jun', $request->get('months'))){
            $count_months++;
            $months=$months.'Jun | ';
            $count_months;
        }
        if(in_array('Jul', $request->get('months'))){
            $count_months++;
            $months=$months.'Jul | ';
            $count_months;
        }
        if(in_array('Aug', $request->get('months'))){
            $count_months++;
            $months=$months.'Aug | ';
            $count_months;
        }
        if(in_array('Sep', $request->get('months'))){
            $count_months++;
            $months=$months.'Sep | ';
            $count_months;
        }
        if(in_array('Oct', $request->get('months'))){
            $count_months++;
            $months=$months.'Oct | ';
            $count_months;
        }
        if(in_array('Nov', $request->get('months'))){
            $count_months++;
            $months=$months.'Nov | ';
            $count_months;
        }
        if(in_array('Dec', $request->get('months'))){
            $count_months++;
            $months=$months.'Dec | ';
            $count_months;
        }
        if(in_array('Jan', $request->get('months'))){
            $count_months++;
            $months=$months.'Jan | ';
            $count_months;
        }
        if(in_array('Feb', $request->get('months'))){
            $count_months++;
            $months=$months.'Feb | ';
            $count_months;
        }
        if(in_array('Mar', $request->get('months'))){
            $count_months++;
            $months=$months.'Mar | ';
            $count_months;
        }

        echo $months;
        echo $count_months;
        $trans_amt=0;
        $trans_amt=$da->amount * $count_months;

       $data = new Fees_Model;
        $data->stu_id=$stu_id;
        $data->amount= $trans_amt;
        $data->fee_type="Transport Fee : Months (".$months.")";
        $data->due_date=date('y-m-d');
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Transport Record has been added in Invoice....');   
        
    }


    
    public function addpayment(Request $request)
    {
      
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Transaction_Model;
        $data->stu_id=$request->stu_id;
        $data->amount=$request->amount;
        $data->final_amount=$request->final_amount;
      //  $dis=($request->amount*$request->discount)/100;
      $dis=$request->discount;
        $data->discount=$dis;
        $data->mode=$request->mode;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success2', 'Payment Record has been added in Invoice....');   
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


    public function distory_fee($id)
    {
        $data = Fees_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Fees Records has been Deleted....');   
    }

    public function distory_transaction($id)
    {
        $data = Transaction_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning2', 'Payment Records has been Deleted....');   
    }
}
