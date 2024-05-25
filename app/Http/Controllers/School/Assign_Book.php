<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Subject_Model;
use App\Models\Class_section_Model;
use App\Models\School_Model;
use App\Models\Section_Model;
use App\Models\Student_Model;
use App\Models\Assign_Book_Model;
use App\Models\Notice_Model;
use App\Models\Soy_Model;
use App\Models\Gallery_Model;
use App\Models\Library_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Session;


class Assign_Book extends Controller
{

   

    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Student_Model::all()->where('sid',$sid)->where('year',$data->year)->where('status',"1");
        
        return view('school.view_student', ['data'=>$data,'data2'=>$data2]);

    }



    public function issue_book($book_id,$stu_id)
    {
     

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();

        if(Assign_Book_Model::where('book_id',$book_id)->where('stu_id',$stu_id)->first())
        {
        $data = Assign_Book_Model::where('book_id',$book_id)->where('stu_id',$stu_id)->first();
        $data->delete();
        }
        $data = new Assign_Book_Model;
        $data->year=$data2->year;
        $data->sid=$sid;

        $data->book_id=$book_id;
        $data->stu_id=$stu_id;
  
        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Book has been Assign to Student....');   
    }



    public function select_book($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Student_Model::where('id',$id)->first();
        $data3 = Library_Model::all()->where('sid',$sid);
      return view('school.select_book', ['data'=>$data,'data2'=>$data2,'data3'=>$data3]);
    }


    public function return_book($book_id,$stu_id)
    {

        $data = Assign_Book_Model::where('book_id',$book_id)->where('stu_id',$stu_id)->first();

        
        $data->book_id=$book_id;
        $data->updated_at="A";
    
        $data->save();
        return redirect()->back()->with('success', 'Book has been Successfully Return....');  
    }



    public function distory($book_id,$stu_id)
    {
        $data = Assign_Book_Model::where('book_id',$book_id)->where('stu_id',$stu_id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Records Cleared....');   
    }
}
