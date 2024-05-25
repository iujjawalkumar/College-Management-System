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
        Schema::create('school__models', function (Blueprint $table) {
            $table->id();

            $table->string('school_id',50);
            $table->string('name',100);
            $table->string('email',100);
            $table->string('mobile',50);
            $table->string('address',200);
            $table->string('school_image',100);
            $table->string('password',100);
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
        Schema::dropIfExists('school__models');
    }
};
