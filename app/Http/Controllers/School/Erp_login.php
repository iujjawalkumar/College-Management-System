<?php

namespace App\Http\Controllers\School;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School_Model;
use App\Models\Employee_Model;
use Session;

class Erp_login extends Controller
{
    public function index()
    {
        return view('school.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
           ]);

           $user = School_Model::where('email', $request['email'])->first();
           $emp = Employee_Model::where('email', $request['email'])->first();
$eid=0;
$status=0;

if ($user) {
    $validCredentials =\Hash::check($request['password'], $user->password);
    $sid=$user->id;
    $user_type="admin";
    $status=$user->status;
}
else
{
    if($emp)
    {
        $validCredentials =\Hash::check($request['password'], $emp->password);
        $sid=$emp->sid;
        $eid=$emp->id;
        $user_type="employee";
        $check_status = School_Model::where('id', $sid)->first();
        $status=$check_status->status;
    }
    else
    {
    return redirect('erp/login')->withError('E-Mail address is not Valid...');
}
}
//if(Auth::attempt($request->only('email','password'))){
  //  return redirect('erp/home');
  // }

  //return view('admin.session_edit', ['sess'=>$sess]);

if ($validCredentials) {
    if($status=="1")
    {
  Session::put('email', $request->email);
  Session::put('sid', $sid);
  Session::put('eid', $eid);
  Session::put('user_type', $user_type);
  return redirect('erp/home');
    }
    else
    {
        return redirect('erp/login')->withError('Account has been De-Active by Administration of Swadeshierp.com..');
    }
  
}
else
{
           return redirect('erp/login')->withError('Login Details are not Valid...');
}
    }

    public function register_view()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required | unique:users',
            'password'=> 'required | min :6 | confirmed' 
           ]);

       User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>\Hash::make($request->password)
       ]);    

       return redirect()->back()->with('success', 'Admin Record has been created....');   
    }

    public function home()
    {
       $sid=Session::get('sid');
       $data = School_Model::where('id', $sid)->first();
        return view('school.dashboard',['data'=>$data]);
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        \Artisan::call('cache:clear');
        return redirect('erp/login');
    }
}
