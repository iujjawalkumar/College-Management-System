<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_section_Model extends Model
{
    use HasFactory;

    public static function getClassNameById($id){
        return Class_section_Model::where('id', $id)->pluck('name')->first();
    }
}
