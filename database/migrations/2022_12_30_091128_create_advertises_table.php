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
        Schema::create('advertises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();;
            $table->unsignedBigInteger('category_id')->nullable();;
            $table->unsignedBigInteger('subset_id')->nullable();;
            $table->unsignedBigInteger('telic_id')->nullable();;
            $table->unsignedBigInteger('province_id')->nullable();;
            $table->unsignedBigInteger('city_id')->nullable();;
            $table->timestamp('confirm')->nullable();;
            $table->string('active')->default('1')->nullable();;
            $table->string('latitude')->nullable();;
            $table->string('longitude')->nullable();;
            $table->string('title')->nullable();;
            $table->text('info')->nullable();;
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
        Schema::dropIfExists('advertises');
    }
};
