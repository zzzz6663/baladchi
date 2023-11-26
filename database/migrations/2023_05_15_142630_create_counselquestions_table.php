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
        Schema::create('counselquestions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counsel_id');
            $table->string('question',500);
            $table->string('type',50)->nullable();
            $table->string('a1',500)->nullable();
            $table->string('a2',500)->nullable();
            $table->string('a3',500)->nullable();
            $table->string('a4',500)->nullable();
            $table->string('a5',500)->nullable();
            $table->string('explain',2500)->nullable();
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
        Schema::dropIfExists('counselquestions');
    }
};
