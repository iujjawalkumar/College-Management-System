<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function getData()
    {
        return view('admin.login');
    }
}
