<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Subject_Model;
use App\Models\Transfer_Model;
use App\Models\Class_section_Model;
use App\Models\School_Model;
use App\Models\Section_Model;
use App\Models\Student_Model;
use App\Models\Notice_Model;
use App\Models\Soy_Model;
use App\Models\Gallery_Model;
use App\Models\Exam_List_Model;
use App\Models\Exam_Schedule_Model;
use App\Models\Exam_Result_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Session;


class Student extends Controller
{

    public function import_stu(Request $request)
    {
        $sid=Session::get('sid');

        $validator=Validator::make($request->all(),[
            //use this
               'file'=>'required|max:50000|mimes:xlsx,xls'
      
           ]);

           try {
            Excel::import(new StudentImport, request()->file('file'));
            return redirect()->back()->with('success', 'Successfully Import Data of Students....');   
        } catch (NoTypeDetectedException $e) {
          
            return redirect()->back()->with('danger', 'Please upload Excel file only....');   
  
        }

        
    }

    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Subject_Model::all()->where('sid',$sid);
        $data_class = Class_Section_Model::all()->where('sid',$sid);
       return view('school.student', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);

    }


    public function website_index()
    {
        $sid="1";
        $notice = Notice_Model::all()->where('sid',$sid);
        $gallery = Gallery_Model::where('sid',$sid)->skip(0)->take(8)->orderBy('id', 'DESC')->get(); 
       return view('website.index', ['notice'=>$notice,'gallery'=>$gallery]);

    }

    public function website_soy()
    {
       
        $sid="1";

        $data=Soy_Model::where('sid', $sid)->orderBy('id', 'DESC')->get();
        return view('website.soy', ['data'=>$data]);
      
    }


    public function import_student()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

       return view('school.import_student', ['data'=>$data]);

    }

    public function fetchSection(Request $request)
    {
        $data['section'] = Section_Model::where("cclass", $request->class_id)
                                ->get(["section", "id"]);
  
        return response()->json($data);
    }


    public function create(Request $request)
    {
        $request->validate([
         'name'=> 'required | max : 50',   
         'ddate'=> 'required | max : 50',   
         'gender'=> 'required | max : 10',   
         'mobile1'=> 'required | max : 10',   
         'address'=> 'required | max : 200',   
         'father_name'=> 'required | max : 50',   
         'mother_name'=> 'required | max : 50',   
         'cclass'=> 'required | max : 50',   
         'section'=> 'required | max : 50',   
         'aadhar_card'=> 'required | max : 50',   
         'file_image'=> 'required | image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        
        ]);

        $image_name=$request->file('file_image')->store('public/student'); 

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
        $data = new Student_Model;
        $data->year=$data2->year;
        $data->sid=$sid;

        $data->file_image=$image_name;
        $data->name=$request->name;
        $data->ddate=$request->ddate;
        $data->gender=$request->gender;
        $data->father_name=$request->father_name;
        $data->mother_name=$request->mother_name;
        $data->father_occupation=$request->father_occupation;
        $data->mother_occupation=$request->mother_occupation;
        $data->education_of_father=$request->education_of_father;
        $data->education_of_mother=$request->education_of_mother;
        $data->adm_no=$request->adm_no;
        $data->mobile1=$request->mobile1;
        $data->mobile2=$request->mobile2;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->aadhar_card=$request->aadhar_card;
        $data->religion=$request->religion;
        $data->nationality=$request->nationality;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->stype=$request->stype;
        $data->status="1";

  
        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Student Records has been Added....');   
    }



    public function add_enq(Request $request)
    {
        $request->validate([
         'name'=> 'required | max : 50',     
         'mobile1'=> 'required | max : 10',   
         'address'=> 'required | max : 200',   
          
         'cclass'=> 'required | max : 50',   
         'section'=> 'required | max : 50',   
        
        
        ]);

    

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
        $data = new Student_Model;
        $data->year=$data2->year;
        $data->sid=$sid;

 
        $data->name=$request->name;
        $data->mobile1=$request->mobile1;
  
        $data->address=$request->address;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->remarks=$request->remarks;
        $data->status="0";

  
        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Student Enquiry Records has been Added....');   
    }



    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Student_Model::where('id',$id)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
      return view('school.edit_student', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }


    public function tc($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Student_Model::where('id',$id)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        if(Transfer_Model::where('stu_id',$id)->first())
        {
            $data2=Transfer_Model::where('stu_id',$id)->first();
            return view('school.print_tc', ['data'=>$data,'data2'=>$data2]);
        }
        else
        {
            return view('school.tc', ['data'=>$data,'data2'=>$data2]);
        }


       
      
    }


    public function edit_enq($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Student_Model::where('id',$id)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
      return view('school.update_enquiry', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }


    public function logo($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Student_Model::where('id',$id)->first();

        return view('school.student_image', ['data'=>$data,'data2'=>$data2]);
    }


    public function doc($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $data2 = Student_Model::where('id',$id)->first();

        return view('school.student_doc', ['data'=>$data,'data2'=>$data2]);
    }

 


    public function update_logo(Request $request)
    {
        $sid=Session::get('sid');

        $request->validate([
 
            'file_image'=> 'required | image | mimes:jpeg,png,jpg,gif,svg | max:2048'
           
           ]);

           $stu_id=$request->stu_id;
       $image_name=$request->file('file_image')->store('public/student'); 
        $image_save  = Student_Model::where('id',$stu_id)->first();
        $image_save->file_image=$image_name;

        $image_save->save();

        return redirect()->back()->with('success', 'Student Photo has been updated....');   
    }


    public function update_doc(Request $request)
    {
        $sid=Session::get('sid');

        $request->validate([
 
            'file_doc'=> 'required | max:2048'
           
           ]);

           $stu_id=$request->stu_id;
       $image_name=$request->file('file_doc')->store('public/student'); 
        $image_save  = Student_Model::where('id',$stu_id)->first();
        $image_save->file_doc=$image_name;

        $image_save->save();

        return redirect()->back()->with('success', 'Student Documents has been uploaded....');   
    }


    public function upload_tc(Request $request)
    {
        $sid=Session::get('sid');

        $request->validate([
 
            'file_doc'=> 'required | max:2048'
           
           ]);

           $stu_id=$request->stu_id;
       $image_name=$request->file('file_doc')->store('public/student'); 
        $image_save  = Student_Model::where('id',$stu_id)->first();
        $image_save->tc_doc=$image_name;

        $image_save->save();

        return redirect()->back()->with('success2', 'Student TC has been uploaded....');   
    }



    public function view_form($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Student_Model::where('id',$id)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
      return view('school.view_form', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }

    public function update(Request $request, $id)
    {

        $data = Student_Model::where('id',$id)->first();

        $data->name=$request->name;
        $data->stype=$request->stype;
        $data->ddate=$request->ddate;
        $data->gender=$request->gender;
        $data->father_name=$request->father_name;
        $data->mother_name=$request->mother_name;
        $data->father_occupation=$request->father_occupation;
        $data->mother_occupation=$request->mother_occupation;
        $data->education_of_father=$request->education_of_father;
        $data->education_of_mother=$request->education_of_mother;
        $data->adm_no=$request->adm_no;
        $data->mobile1=$request->mobile1;
        $data->mobile2=$request->mobile2;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->aadhar_card=$request->aadhar_card;
        $data->religion=$request->religion;
        $data->nationality=$request->nationality;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->status="1";
   
        $data->save();
        return redirect()->back()->with('success', 'Student Records has been updated....');   
    }


    public function tc_update(Request $request, $id)
    {

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
        $data = new Transfer_Model;
        $data->year=$data2->year;
        $data->sid=$sid;
        $data->stu_id=$id;

        $data->name=$request->name;
        $data->dob=$request->dob;
        $data->father_name=$request->father_name;
        $data->mother_name=$request->mother_name;
        $data->adm_no=$request->adm_no;
        $data->regno=$request->regno;
        $data->from_class=$request->from_class;
        $data->to_class=$request->to_class;
        $data->nationality=$request->nationality;
        $data->category=$request->category;
        $data->failed=$request->failed;
        $data->subject=$request->subject;
        $data->last_study=$request->last_study;
        $data->results=$request->result;

        $data->promotion=$request->promotion;
        $data->fees=$request->fees;
        $data->concession=$request->concession;
        $data->ncc=$request->ncc;
        $data->meeting=$request->meeting;
        $data->ended=$request->ended;
        $data->conduct=$request->conduct;
        $data->remarks=$request->remarks;
        $data->doc=$request->doc;
        $data->reason=$request->reason;

      
   
        $data->save();
        return redirect()->back()->with('success', 'TC Records has been successfully created....');   
    }




    public function update_enq(Request $request, $id)
    {

        $data = Student_Model::where('id',$id)->first();

       
        $data->name=$request->name;
        $data->mobile1=$request->mobile1;
  
        $data->address=$request->address;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->remarks=$request->remarks;
        $data->status=$request->status;
   
        $data->save();
        return redirect()->back()->with('success', 'Student Records has been updated....');   
    }

    public function view()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Student_Model::all()->where('sid',$sid)->where('year',$data->year)->where('status',"1");
        
        return view('school.viewstudent', ['data'=>$data,'data2'=>$data2]);
    }

    public function viewenquiry()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Student_Model::all()->where('sid',$sid)->where('year',$data->year)->where('status',"0");
        
        return view('school.view_enquiry', ['data'=>$data,'data2'=>$data2]);
    }


    public function idcard()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Student_Model::all()->where('sid',$sid)->where('year',$data->year)->where('status',"1");
        
        return view('school.viewstu', ['data'=>$data,'data2'=>$data2]);
    }



    public function select_exam()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Exam_List_Model::all()->where('sid',$sid);
        
        return view('school.select_exam', ['data'=>$data,'data2'=>$data2]);
    }


    public function select_exam2()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Exam_List_Model::all()->where('sid',$sid);
        
        return view('school.select_exam2', ['data'=>$data,'data2'=>$data2]);
    }


    public function admitcard(Request $request)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $exam_id=$request->exam_id;
        $data2=Student_Model::all()->where('sid',$sid)->where('year',$data->year)->where('status',"1");
        return view('school.viewstus', ['data'=>$data,'data2'=>$data2,'exam_id'=>$exam_id]);
    }

    public function result_update(Request $request)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
        $exam_id=$request->exam_id;
        $data2=Student_Model::all()->where('sid',$sid)->where('year',$data->year)->where('status',"1");
        return view('school.view_stu', ['data'=>$data,'data2'=>$data2,'exam_id'=>$exam_id]);
    }

    
    public function idcard_print($id)
    {
        
        $data2 = Student_Model::where('id',$id)->first();
        $data = School_Model::where('id', $data2->sid)->first();

      return view('school.idcard', ['data'=>$data,'data2'=>$data2]);
    }

    public function tc_print($id)
    {
        
        $data2 = Transfer_Model::where('stu_id',$id)->first();
        $data = School_Model::where('id', $data2->sid)->first();

      return view('school.tc_print', ['data'=>$data,'data2'=>$data2]);
    }


    public function check_tc2(Request $request)
    {
        $adm_no=$request->Admission_No;
        if(Student_Model::where('adm_no',$adm_no)->first())
        {
            $data2 = Student_Model::where('adm_no',$adm_no)->first();
            $data = School_Model::where('id', $data2->sid)->first();
            //return view('school.tc_print', ['data'=>$data,'data2'=>$data2]);
             return redirect()->to(asset('storage/student/'.substr($data2->tc_doc, 15)));

        }
        else
        {
            return redirect('check_tc')->withError('Admission No. not found...');
        }
        

      
    }

    public function admitcard_print($id,$eid)
    {
        
        $data2 = Student_Model::where('id',$id)->first();
        $data = School_Model::where('id', $data2->sid)->first();
        $exam=Exam_Schedule_Model::orderBy('ddate', 'ASC')->where('exam_id',$eid)->where('cclass',$data2->cclass)->where('section',$data2->section)->get();
      return view('school.admitcard', ['data'=>$data,'data2'=>$data2,'exam'=>$exam]);
    }

    public function print_exam_result($id,$eid)
    {
        
        $data2 = Student_Model::where('id',$id)->first();
        $data = School_Model::where('id', $data2->sid)->first();
        $exam_name = Exam_List_Model::where('id',$eid)->first();
        $exam=Exam_Result_Model::orderBy('id', 'DESC')->where('exam_id',$eid)->where('stu_id',$id)->get();
      return view('school.print_result', ['data'=>$data,'data2'=>$data2,'exam'=>$exam,'exam_name'=>$exam_name,'eid'=>$eid]);
    }

    public function distory($id)
    {
        $data = Student_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Students Record has been Deleted....');   
    }

    public function transfer_distory($id)
    {
        $data = Transfer_Model::where('stu_id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Transfer Record has been Deleted....');   
    }

    public function check_tc()
    {
        return view('school.check_tc');
    }

}
