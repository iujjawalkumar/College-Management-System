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
        Schema::create('employee__salary__models', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id',50);
            $table->string('basic',100);
            $table->string('da',100);
            $table->string('hra',100);
            $table->string('ca',100);
            $table->string('ma',100);
            $table->string('sa',100);
            $table->string('total',100);
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
        Schema::dropIfExists('employee__salary__models');
    }
};
