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

        Schema::create('filters', function (Blueprint $table) {
            $table->id();
            $table->string('fa')->nullable();
            $table->string('en')->nullable();
            $table->string('active')->default(1);
            $table->timestamps();
        });

        Schema::create('filter_subset', function (Blueprint $table) {
            $table->unsignedBigInteger('filter_id');
            // $table->foreign('filter_id')->references('id')->on('curts')->onDelete('cascade');
            $table->unsignedBigInteger('subset_id');
            // $table->foreign('subset_id')->references('id')->on('subsets')->onDelete('cascade');
            $table->primary(['filter_id','subset_id']);
            $table->string('active')->default(1);
        });
        Schema::create('filter_telic', function (Blueprint $table) {
            $table->unsignedBigInteger('filter_id');
            // $table->foreign('filter_id')->references('id')->on('curts')->onDelete('cascade');
            $table->unsignedBigInteger('telic_id');
            // $table->foreign('telic_id')->references('id')->on('telics')->onDelete('cascade');
            $table->primary(['filter_id','telic_id']);
            $table->string('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filters');
    }
};
