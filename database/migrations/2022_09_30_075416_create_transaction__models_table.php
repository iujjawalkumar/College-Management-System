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
        Schema::create('transaction__models', function (Blueprint $table) {
            $table->id();
            $table->string('stu_id',50);
            $table->string('amount',50);
            $table->string('mode',50);
            $table->string('final_amount',50);
            $table->string('discount',50);
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
        Schema::dropIfExists('transaction__models');
    }
};
