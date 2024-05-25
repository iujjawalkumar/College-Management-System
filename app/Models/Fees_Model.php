<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees_Model extends Model
{
    use HasFactory;


    public static function getMonthById($id, $month){
        if(Fees_Model::where('stu_id', $id)->where('fee_type', 'like', '%' .$month. '%')->first())
        {
            return true;
        }
    }



    public static function getFee($stu_id,$cclass,$section){
        if(Fees_Model::where('id', $id)->pluck('fee_type')->first())
        {
        return Fees_Model::where('id', $id)->pluck('fee_type')->first();
        }
        else
        {
            return $id;
        }
    }
}
