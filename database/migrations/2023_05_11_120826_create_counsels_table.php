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
        Schema::create('counsels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('skill_id');
            $table->string('title',256);
            $table->string('active')->default('0');
            $table->string('pay')->default('0');
            $table->integer('star')->nullable();
            $table->integer('price')->nullable();
            $table->integer('count')->nullable();
            $table->string('type')->nullable();
            $table->string('answers')->nullable();
            $table->string('question')->nullable();
            $table->string('reward')->nullable();
            $table->string('qtype')->nullable();
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
        Schema::dropIfExists('counsels');
    }
};
