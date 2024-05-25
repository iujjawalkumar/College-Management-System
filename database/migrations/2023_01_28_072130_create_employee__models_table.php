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
        Schema::create('employee__models', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('qualification',100);
            $table->string('exp',50);
            $table->string('uid',50);
            $table->string('pan',50);
            $table->string('address',200);
            $table->string('mob',50);
            $table->string('email',50);
            $table->string('accno',50);
            $table->string('ifsc',50);
            $table->string('dob',50);
            $table->string('doj',50);
            $table->string('desi',50);
            $table->string('year',50);
            $table->string('sid',50);
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
        Schema::dropIfExists('employee__models');
    }
};
