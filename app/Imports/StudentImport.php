<?php

namespace App\Imports;

use App\Models\Student_Model;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student_Model([
            'cclass'=>$row[0],
            'section'=>$row[1],
            'name'=>$row[2],
            'ddate'=>$row[3],
            'father_name'=>$row[4],
            'mother_name'=>$row[5],
            'father_occupation'=>$row[6],
            'mother_occupation'=>$row[7],
            'education_of_father'=>$row[8],
            'education_of_mother'=>$row[9],
            'mobile1'=>$row[10],
            'mobile2'=>$row[11],
            'email'=>$row[12],
            'address'=>$row[13],
            'aadhar_card'=>$row[14],
            'gender'=>$row[15],
            'religion'=>$row[16],
            'nationality'=>$row[17],
            'adm_no'=>$row[18],
            'status'=>"1",
            'year'=>"2022-23",
            'sid'=>"1",
            'file_image'=>"NA",
           
        ]);
    }
}
