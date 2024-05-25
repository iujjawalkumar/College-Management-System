<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Subject_Model;
use App\Models\Class_section_Model;
use App\Models\School_Model;
use App\Models\Section_Model;
use App\Models\Student_Model;
use App\Models\Notice_Model;
use App\Models\Soy_Model;
use App\Models\Gallery_Model;
use App\Models\Custom_page_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Session;

class Home extends Controller
{
    public function website_index()
    {
        $sid="6";
        $title="Home";
        $notice = Notice_Model::all()->where('sid',$sid);
        $custom_page = Custom_page_Model::all()->where('sid',$sid);
        $data = School_Model::where('id', $sid)->first();
        $gallery = Gallery_Model::where('sid',$sid)->skip(0)->take(3)->orderBy('id', 'DESC')->get(); 
       return view('website.index', ['notice'=>$notice,'gallery'=>$gallery,'data'=>$data,'title'=>$title,'custom_page'=>$custom_page]);

    }






    public function cbse()
    {
        $sid="6";
        $title="Mandatory Public Disclosure";
        $notice = Notice_Model::all()->where('sid',$sid);
        $custom_page = Custom_page_Model::all()->where('sid',$sid);
        $data = School_Model::where('id', $sid)->first();
        $gallery = Gallery_Model::where('sid',$sid)->skip(0)->take(8)->orderBy('id', 'DESC')->get(); 
       return view('website.cbse', ['notice'=>$notice,'gallery'=>$gallery,'data'=>$data,'title'=>$title,'custom_page'=>$custom_page]);

    }


    public function contact()
    {
        $sid="6";
        $title="Contact";
        $notice = Notice_Model::all()->where('sid',$sid);
        $custom_page = Custom_page_Model::all()->where('sid',$sid);
        $data = School_Model::where('id', $sid)->first();
        $gallery = Gallery_Model::where('sid',$sid)->skip(0)->take(8)->orderBy('id', 'DESC')->get(); 
       return view('website.contact', ['notice'=>$notice,'gallery'=>$gallery,'data'=>$data,'title'=>$title,'custom_page'=>$custom_page]);

    }





    public function events()
    {
        $sid="6";
        $title="Event's & Program's";
        $notice = Notice_Model::all()->where('sid',$sid);
        $custom_page = Custom_page_Model::all()->where('sid',$sid);
        $data = School_Model::where('id', $sid)->first();
        $gallery = Gallery_Model::where('sid',$sid)->skip(0)->take(8)->orderBy('id', 'DESC')->get(); 
       return view('website.events', ['notice'=>$notice,'gallery'=>$gallery,'data'=>$data,'title'=>$title,'custom_page'=>$custom_page]);

    }


    public function gallery()
    {
        $sid="6";
        $title="Photo's Gallery";
        $notice = Notice_Model::all()->where('sid',$sid);
        $custom_page = Custom_page_Model::all()->where('sid',$sid);
        $data = School_Model::where('id', $sid)->first();
        $gallery = Gallery_Model::where('sid',$sid)->skip(0)->take(8)->orderBy('id', 'DESC')->get(); 
       return view('website.gallery', ['notice'=>$notice,'gallery'=>$gallery,'data'=>$data,'title'=>$title,'custom_page'=>$custom_page]);

    }

    
    public function video()
    {
        $sid="6";
        $title="Video's Gallery";
        $notice = Notice_Model::all()->where('sid',$sid);
        $custom_page = Custom_page_Model::all()->where('sid',$sid);
        $data = School_Model::where('id', $sid)->first();
        $gallery = Gallery_Model::where('sid',$sid)->skip(0)->take(8)->orderBy('id', 'DESC')->get(); 
       return view('website.video', ['notice'=>$notice,'gallery'=>$gallery,'data'=>$data,'title'=>$title,'custom_page'=>$custom_page]);

    }
    

    public function custom_page($id)
    {
        $sid="6";
        $notice = Notice_Model::all()->where('sid',$sid);
        $custom_page = Custom_page_Model::all()->where('sid',$sid);
        $page = Custom_page_Model::where('id',$id)->first();
        $title=$page->name;
        $data = School_Model::where('id', $sid)->first();
        $gallery = Gallery_Model::where('sid',$sid)->skip(0)->take(8)->orderBy('id', 'DESC')->get(); 
       return view('website.page', ['notice'=>$notice,'gallery'=>$gallery,'data'=>$data,'title'=>$title,'custom_page'=>$custom_page,'page'=>$page]);

    }

}
