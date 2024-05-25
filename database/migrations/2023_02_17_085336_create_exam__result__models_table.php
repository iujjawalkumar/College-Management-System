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
        Schema::create('exam__result__models', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id',50);
            $table->string('stu_id',50);
            $table->string('sub_id',50);
            $table->string('om',50);
            $table->string('mm',50);
            $table->string('sid',50);
            $table->string('year',50);
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
        Schema::dropIfExists('exam__result__models');
    }
};
