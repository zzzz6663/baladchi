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
        Schema::create('subset_user', function (Blueprint $table) {
            $table->unsignedBigInteger('subset_id');
            // $table->foreign('subset_id')->references('id')->on('subsets')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['subset_id','user_id' ]);
        });
        Schema::create('telic_user', function (Blueprint $table) {
            $table->unsignedBigInteger('telic_id');
            // $table->foreign('telic_id')->references('id')->on('telics')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['telic_id','user_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telic_user');
        Schema::dropIfExists('subset_user');
    }
};
