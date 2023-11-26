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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('family')->nullable();;
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('email',50)->unique()->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role',30)->nullable();
            $table->string('mobile',30)->nullable();
            $table->string('gender',10)->nullable();
            $table->string('degree',20)->nullable();
            $table->string('avatar',50)->nullable();
            $table->string('password')->nullable();
            $table->timestamp('b_date')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
