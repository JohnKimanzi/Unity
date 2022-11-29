<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->double('amount');
            $table->string('transacted_by');
            $table->foreignUuid('transaction_type_id')->constrained('transaction_types');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('collector_id')->constrained('users')->nullable();
            $table->foreignId('co_collector_id')->constrained('users')->nullable();
            $table->foreignId('co_co_collector_id')->constrained('users')->nullable();
            $table->foreignId('debt_id')->constrained('debts');
            $table->date('transaction_date');
            $table->string('note')->nulable();
            $table->timestamps();
            $table->softDeletes();
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
}
