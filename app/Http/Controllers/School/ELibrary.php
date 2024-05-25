<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ELibrary_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class ELibrary extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=ELibrary_Model::all()->where('sid', $sid);
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.elibrary', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }


    public function create(Request $request)
    {
        $request->validate([
         'book_name'=> 'required | max : 200',  
         'author'=> 'required | max : 200',
         'doc_file'=> 'required|mimes:pdf|max:2048' 
         
        ]);

        $doc_file=$request->file('doc_file')->store('public/student'); 

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new ELibrary_Model;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->book_name=$request->book_name;
        $data->author=$request->author;
        $data->doc_file=$doc_file;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Book Records has been successfully added in the E-Library....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = ELibrary_Model::where('id',$id)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.elibrary_edit', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);

    }


    public function update(Request $request, $id)
    {

        
        $request->validate([
            'book_name'=> 'required | max : 200',  
            'author'=> 'required | max : 200',
            'doc_file'=> 'required|mimes:pdf|max:2048'   
            
           ]);
   
           $doc_file=$request->file('doc_file')->store('public/student');   
        $data = ELibrary_Model::where('id',$id)->first();
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->book_name=$request->book_name;
        $data->author=$request->author;
        $data->doc_file=$doc_file;

        $data->save();
        return redirect()->back()->with('success', 'Book Details has been updated in the E-Library....');      
      
    }


    public function distory($id)
    {
        $data = ELibrary_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'E-Library Records has been Deleted....');   
    }
}
