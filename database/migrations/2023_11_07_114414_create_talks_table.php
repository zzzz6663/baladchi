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
        Schema::create('talks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('to_id');
            $table->unsignedBigInteger('user_id');
            $table->string('price')->nullable();
            $table->string('status')->default("created")->nullable();
            $table->timestamp('confirm')->nullable();
            $table->unsignedBigInteger('confirm_id')->nullable();
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
        Schema::dropIfExists('talks');
    }
};
