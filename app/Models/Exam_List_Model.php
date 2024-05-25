<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_List_Model extends Model
{
    use HasFactory;
    public static function getName($id){
        return Exam_List_Model::where('id', $id)->pluck('title')->first();
    } 
}
