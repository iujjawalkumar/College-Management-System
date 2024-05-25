<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_Book_Model extends Model
{
    use HasFactory;
    public static function getData($id){
        
        if(Assign_Book_Model::where('book_id', $id)->pluck('created_at')->first())
        return Assign_Book_Model::where('book_id', $id)->pluck('created_at')->first();
        else
        return "Not Issue";
    }

    public static function getData2($id){
        
        if(Assign_Book_Model::where('book_id', $id)->pluck('updated_at')->first()!=Assign_Book_Model::where('book_id', $id)->pluck('created_at')->first())
        return Assign_Book_Model::where('book_id', $id)->pluck('updated_at')->first();
        else
        return "Not Return";

    }
}
