<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fees_Model;

class Transaction_Model extends Model
{
    use HasFactory;

    public static function getDuesById($id){

        $amount=Fees_Model::where('stu_id', $id)->sum('amount');

        $deposit=Transaction_Model::where('stu_id', $id)->sum('final_amount');
        $dis=Transaction_Model::where('stu_id', $id)->sum('discount');

        return $fee_total=$amount-$deposit-$dis;
        //return Fee_Model::where('id', $id)->pluck('fee_type')->first();
    }


    public static function getDuesFeeById($id,$from_date,$to_date){


        $amount=Fees_Model::whereBetween('created_at', [$from_date, $to_date])->where('stu_id', $id)->sum('amount');

        $deposit=Transaction_Model::whereBetween('created_at', [$from_date, $to_date])->where('stu_id', $id)->sum('final_amount');
        $dis=Transaction_Model::whereBetween('created_at', [$from_date, $to_date])->where('stu_id', $id)->sum('discount');

        return $fee_total=$amount-$deposit-$dis;
        //return Fee_Model::where('id', $id)->pluck('fee_type')->first();
    }


    public static function getFeeById($id,$from_date,$to_date){

        return $amount=Fees_Model::whereBetween('created_at', [$from_date, $to_date])->where('stu_id', $id)->sum('amount');

    }

    public static function getPaidById($id,$from_date,$to_date){

      

        $deposit=Transaction_Model::whereBetween('created_at', [$from_date, $to_date])->where('stu_id', $id)->sum('final_amount');
        $dis=Transaction_Model::whereBetween('created_at', [$from_date, $to_date])->where('stu_id', $id)->sum('discount');

        return $fee_total=$deposit-$dis;
     
    }


}
