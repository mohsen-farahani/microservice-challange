<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('amount');
            $table->string('operation type')->comment('increase or decrease');
            $table->string('gateway_type')->comment('discount or bank');
            $table->string('reason_by')->nullable(true)->comment('example: discount code');
            $table->integer('status')->comment('0 => pending , 1 => success , 2 => rolback');
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
        Schema::dropIfExists('financial_transactions');
    }
}
