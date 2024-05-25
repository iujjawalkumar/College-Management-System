<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section_Model extends Model
{
    use HasFactory;
    public static function getSectionNameById($id){
        
        if(Section_Model::where('id', $id)->pluck('section')->first())
        return Section_Model::where('id', $id)->pluck('section')->first();
        else
        return "All";

    }
}
