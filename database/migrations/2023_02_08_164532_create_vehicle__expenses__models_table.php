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
        Schema::create('vehicle__expenses__models', function (Blueprint $table) {
            $table->id();
            $table->string('from_reading',50);
            $table->string('to_reading',50);
            $table->string('reading',50);
            $table->string('fuel',100);
            $table->string('rent',100);
            $table->string('repair',100);
            $table->string('ddate',100);
            $table->string('year',50);
            $table->string('sid',50);
            $table->string('vehicle_id',50);
            $table->string('driver_id',50);
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
        Schema::dropIfExists('vehicle__expenses__models');
    }
};
