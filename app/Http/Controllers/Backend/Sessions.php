<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session_Model;
use App\Models\School_Model;
use Session;

class Sessions extends Controller
{
    public function index()
    {
        $sessions=Session_Model::latest()->paginate();
        return view('admin.addsession', ['sessions'=>$sessions]);
    }

    public function create(Request $request)
    {
        $request->validate([
         'year'=> 'required | unique:session__models| max : 10'   
        ]);
       $sess = new Session_Model;
        $sess->year=$request->year;

        $sess->save();
        //return redirect('/');
        return redirect()->back()->with('success', 'Session Record has been added....');   
    }


    public function edit($id)
    {
      $sess = Session_Model::where('id',$id)->first();
      return view('admin.session_edit', ['sess'=>$sess]);
    }

    public function view()
    {

        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();
      
        $data2 = Session_Model::all();
      //$sess = Session::where('id',$id)->first();
      return view('school.sessions', ['data'=>$data,'sess'=>$data2]);
    }


    public function update_session(Request $request)
    {
        $email=Session::get('email');
        $sess = School_Model::where('email',$email)->first();
        $sess->year=$request->year;
        $sess->save();
        return redirect()->back()->with('success', 'Session Record has been selected....');   
    }

    
    public function update(Request $request, $id)
    {
        $sess = Session_Model::where('id',$id)->first();
        $sess->year=$request->year;
        $sess->save();
        return redirect()->back()->with('success', 'Session Record has been updated....');   
    }


    public function distory($id)
    {
        $sess = Session_Model::where('id',$id)->first();
        $sess->delete();
        return redirect()->back()->with('warning', 'Session Record has been Deleted....');   
    }
}
