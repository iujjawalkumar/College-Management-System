<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library_Model;
use App\Models\School_Model;
use App\Models\Class_section_Model;
use Session;

class Library extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Library_Model::all()->where('sid', $sid);
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.library', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);
    }


    public function create(Request $request)
    {
        $request->validate([
         'book_name'=> 'required | max : 200',  
         'author'=> 'required | max : 200',
         'quantity'=> 'required | max : 200'
         
        ]);

        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
       $data = new Library_Model;
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->book_name=$request->book_name;
        $data->author=$request->author;
        $data->qty=$request->quantity;
        $data->sid=$sid;
        $data->year=$data2->year;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Book Records has been successfully added in the Library....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Library_Model::where('id',$id)->first();
        $data_class = Class_Section_Model::all()->where('sid',$sid);
        return view('school.library_edit', ['data'=>$data,'data2'=>$data2,'data_class'=>$data_class]);

    }


    public function update(Request $request, $id)
    {

        
        $request->validate([
            'book_name'=> 'required | max : 200',  
            'author'=> 'required | max : 200',  
            'quantity'=> 'required | max : 200'
            
           ]);
   
          
        $data = Library_Model::where('id',$id)->first();
        $data->cclass=$request->cclass;
        $data->section=$request->section;
        $data->book_name=$request->book_name;
        $data->author=$request->author;
        $data->qty=$request->quantity;

        $data->save();
        return redirect()->back()->with('success', 'Book Details has been updated in the Library....');      
      
    }


    public function distory($id)
    {
        $data = Library_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Library Records has been Deleted....');   
    }
}
