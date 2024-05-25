<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_Model extends Model
{
    use HasFactory;
    public static function getSubject($id){
        return Subject_Model::where('id', $id)->pluck('subject')->first();
    }
}
