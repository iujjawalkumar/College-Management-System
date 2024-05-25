<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_Model extends Model
{
    use HasFactory;
    public static function getName($id){
        return Employee_Model::where('id', $id)->pluck('name')->first();
    }
    public static function getMob($id){
        return Employee_Model::where('id', $id)->pluck('mob')->first();
    }

    public static function getDesignation($id){
        return Employee_Model::where('id', $id)->pluck('desi')->first();
    }
}
