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
        Schema::create('soy__models', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('class_section',50);
            $table->string('rank',50);
            $table->string('sid',50);
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
        Schema::dropIfExists('soy__models');
    }
};
