<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee_Model;
use App\Models\Employee_Salary_Model;
use App\Models\School_Model;
use App\Models\Salary_Model;
use App\Models\User_Role_Model;
use Session;

class User_Role extends Controller
{
    public function index($id)
    {
        $sid=Session::get('sid');
        $data = School_Model::where('id', $sid)->first();

        $data2 = Employee_Model::where('id',$id)->first();
        $role=User_Role_Model::all()->where('emp_id',$id);
     
        return view('school.select_role', ['data'=>$data,'data2'=>$data2,'role'=>$role]);
    }

    public function update(Request $request, $id)
    {
        
        $sid=Session::get('sid');
        $data2 = School_Model::where('id', $sid)->first();
        $data = new User_Role_Model;
        $data->year=$data2->year;
        $data->sid=$sid;

        $data->emp_id=$id;
        $data->role=$request->role;
   
        $data->save();
        return redirect()->back()->with('success', 'User Role has been Successfully Assign....');   
    }

    


    public function distory($id)
    {
        $data = User_Role_Model::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('warning', 'User Role has been Deleted....');   
    }

    

}
