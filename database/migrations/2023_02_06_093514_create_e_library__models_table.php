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
        Schema::create('e_library__models', function (Blueprint $table) {
            $table->id();
            $table->string('cclass',50);
            $table->string('section',50);
            $table->string('book_name',50);
            $table->string('author',50);
            $table->string('doc_file',500);
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
        Schema::dropIfExists('e_library__models');
    }
};
