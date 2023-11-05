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
        Schema::create('transactions', function (Blueprint $table) {

            $table->unsignedInteger('id')->autoIncrement();

            $table->unsignedBigInteger('sender_account_number');

            $table->unsignedBigInteger('reciever_account_number');

            $table->string('type');
            $table->string('amount');
            $table->string('currency');

            $table->string('current_balance');
            $table->string('current_balance_currency');

            $table->string('status');
            $table->string('remarks')->nullable();

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
        Schema::dropIfExists('transactions');
    }
};
