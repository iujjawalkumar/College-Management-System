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
        Schema::create('exam__schedule__models', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id',50);
            $table->string('cclass',50);
            $table->string('section',50);
            $table->string('subject',50);
            $table->string('ddate',50);
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
        Schema::dropIfExists('exam__schedule__models');
    }
};
