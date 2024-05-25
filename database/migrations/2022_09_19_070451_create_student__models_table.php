<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__models', function (Blueprint $table) {
            $table->id();
            $table->string('status',10);
            $table->string('year',50);
            $table->string('sid',50);

            $table->string('name',50);
            $table->string('ddate',50);
            $table->string('gender',10);
            $table->string('father_name',50);
            $table->string('mother_name',50);
            $table->string('father_occupation',50);
            $table->string('mother_occupation',50);
            $table->string('education_of_father',50);
            $table->string('education_of_mother',50);
            $table->string('adm_no',50);
            $table->string('mobile1',50);
            $table->string('mobile2',50);
            $table->string('email',50);
            $table->string('address',200);
            $table->string('aadhar_card',50);
            $table->string('religion',50);
            $table->string('nationality',50);
            $table->string('cclass',50);
            $table->string('section',50);
     
            $table->string('file_image',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__models');
    }
};
