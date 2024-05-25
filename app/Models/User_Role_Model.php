<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Role_Model extends Model
{
    use HasFactory;

    public static function getRole($eid,$menu){
        if(User_Role_Model::where('emp_id', $eid)->where('role', $menu)->first())
        {
            return "1";
        }
        else
        {
            return "0";
        }
        
    }
}
