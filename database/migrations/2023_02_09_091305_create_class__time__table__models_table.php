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
        Schema::create('class__time__table__models', function (Blueprint $table) {
            $table->id();
            $table->string('cclass',50);
            $table->string('section',50);
            $table->string('subject',50);
            $table->string('teacher',50);
            $table->string('period',50);
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
        Schema::dropIfExists('class__time__table__models');
    }
};
