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
        Schema::create('subs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name')->unique();
            $table->string('icon')->unique()->nullable();
            $table->text('info')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        // Schema::create('category_sub', function (Blueprint $table) {
        //     $table->unsignedBigInteger('category_id');
        //     // $table->foreign('category_id')->references('id')->on('curts')->onDelete('cascade');
        //     $table->unsignedBigInteger('sub_id');
        //     // $table->foreign('sub_id')->references('id')->on('subs')->onDelete('cascade');
        //     $table->primary(['category_id','sub_id']);
        //     $table->string('active')->default(1);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_sub');
        Schema::dropIfExists('subs');
    }
};
