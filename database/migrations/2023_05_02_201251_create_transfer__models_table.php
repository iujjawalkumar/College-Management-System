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
        Schema::create('transfer__models', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('dob',50);
            $table->string('father_name',50);
            $table->string('mother_name',50);
            $table->string('adm_no',50);
            $table->string('regno',50);
            $table->string('from_class',50);
            $table->string('to_class',50);
            $table->string('nationality',50);
            $table->string('category',50);
            $table->string('failed',50);
            $table->string('subject',50);
            $table->string('last_study',50);
            $table->string('result',50);
            $table->string('promotion',50);
            $table->string('fees',50);
            $table->string('concession',50);
            $table->string('ncc',50);
            $table->string('reason',50);
            $table->string('meeting',50);
            $table->string('ended',50);
            $table->string('conduct',50);
            $table->string('remarks',50);
            $table->string('doc',50);
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
        Schema::dropIfExists('transfer__models');
    }
};
