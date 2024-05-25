<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary_Model extends Model
{
    use HasFactory;
    public static function getDate($id){
   
        return Salary_Model::where('emp_id', $id)->pluck('date')->last();
 
    }
}
