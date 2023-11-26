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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string("tag",256);
            $table->timestamps();
        });


        Schema::create('counsel_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('counsel_id');
            $table->primary(['tag_id','counsel_id']);
        });


        Schema::create('viewcounsel_user', function (Blueprint $table) {
            $table->unsignedBigInteger('counsel_id');
            $table->unsignedBigInteger('user_id');
            $table->primary(['counsel_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viewcounsel_user');
        Schema::dropIfExists('counsel_tag');
        Schema::dropIfExists('tags');
    }
};
