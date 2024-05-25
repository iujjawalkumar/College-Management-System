<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Model extends Model
{
    use HasFactory;
   // protected $fillable = ['name'];
   public static function getNameById($id){
    return Student_Model::where('id', $id)->pluck('name')->first();
}

public static function getClassById($id){
    $cid= Student_Model::where('id', $id)->pluck('cclass')->first();
    return Class_section_Model::where('id', $cid)->pluck('name')->first();
}

public static function getSectionById($id){
    $sid=Student_Model::where('id', $id)->pluck('section')->first();
    return Section_Model::where('id', $sid)->pluck('section')->first();
}

public static function getMobileById($id){
    return Student_Model::where('id', $id)->pluck('mobile1')->first();
}

public static function getAdmById($id){
    return Student_Model::where('id', $id)->pluck('adm_no')->first();
}

public static function getDatabyClass($sid,$cclass){
    if(Student_Model::all()->where('sid', $sid)->where('cclass', $cclass)->first())
    {
    return "True";
    }
}


public static function getDatabySection($sid,$cclass,$section){
    if(Student_Model::all()->where('sid', $sid)->where('cclass', $cclass)->where('section', $section)->first())
    {
    return "True";
    }
}


    protected $fillable = [
        'name',
        'ddate',
        'gender',
        'father_name',
        'mother_name',
        'father_occupation',
        'mother_occupation',
        'education_of_father',
        'education_of_mother',
        'mobile1',
        'mobile2',
        'email',
        'address',
        'aadhar_card',
        'religion',
        'nationality',
        'adm_no',
        'status',
        'cclass',
        'section',
        'year',
        'sid',
        'file_image'
    ];
}
