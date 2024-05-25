<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Model extends Model
{
    use HasFactory;
    public static function getVehicle($id){
        return Vehicle_Model::where('id', $id)->pluck('vehicle_name')->first();
    }

    public static function getVehicle_type($id){
        return Vehicle_Model::where('id', $id)->pluck('vehicle_type')->first();
    }

    public static function getVehicle_amount($id){
        return Vehicle_Model::where('id', $id)->pluck('amount')->first();
    }

  
}
