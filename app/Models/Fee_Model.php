<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_Model extends Model
{
    use HasFactory;
    public static function getFeeNameById($id){
        if(Fee_Model::where('id', $id)->pluck('fee_type')->first())
        {
        return Fee_Model::where('id', $id)->pluck('fee_type')->first();
        }
        else
        {
            return $id;
        }
    }
}
