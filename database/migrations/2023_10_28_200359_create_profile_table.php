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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->unsignedDouble('balanceBDT')->nullable()->default(0);
            $table->unsignedDouble('balanceUSD')->nullable()->default(0);
            $table->unsignedDouble('balanceETH')->nullable()->default(0);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
};
