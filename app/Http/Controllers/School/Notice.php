<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice_Model;
use App\Models\School_Model;
use Session;

class Notice extends Controller
{
    public function index()
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2=Notice_Model::where('sid', $sid)->latest()->paginate();
        return view('school.notice', ['data'=>$data,'data2'=>$data2]);
    }


    public function create(Request $request)
    {
        $request->validate([
         'title'=> 'required | max : 200'   
        ]);

        $sid=Session::get('sid');
        //$data = Notice_Model::where('id', $sid)->first();
       $data = new Notice_Model;
        $data->title=$request->title;
        $data->sid=$sid;

        $data->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Notification has been post on Site....');   
    }


    public function edit($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Notice_Model::where('id',$id)->first();
      return view('school.notice_edit', ['data'=>$data,'data2'=>$data2,]);
    }


    public function update(Request $request, $id)
    {

        $data = Notice_Model::where('id',$id)->first();
        $data->title=$request->title;
        $data->save();
        return redirect()->back()->with('success', 'Notification has been updated....');   
    }


    public function distory($id)
    {
        $data = Notice_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'Notification has been Deleted....');   
    }
}
