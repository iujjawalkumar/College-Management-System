<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes_Model extends Model
{
    use HasFactory;
    public static function getRouteNameById($id){
        return Routes_Model::where('id', $id)->pluck('route_name')->first();
    }
}
