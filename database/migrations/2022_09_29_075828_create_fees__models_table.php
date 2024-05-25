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
        Schema::create('fees__models', function (Blueprint $table) {
            $table->id();
            $table->string('stu_id',50);
            $table->string('fee_type',50);
            $table->string('amount',50);
            $table->string('due_date',50);
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
        Schema::dropIfExists('fees__models');
    }
};
