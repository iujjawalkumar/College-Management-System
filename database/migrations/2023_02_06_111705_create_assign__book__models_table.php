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
        Schema::create('assign__book__models', function (Blueprint $table) {
            $table->id();
          
            $table->string('book_id',50);
            $table->string('stu_id',50);
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
        Schema::dropIfExists('assign__book__models');
    }
};
