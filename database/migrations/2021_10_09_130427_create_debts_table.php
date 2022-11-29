<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            // $table->double('current_balance')->nullable();
            $table->double('principal');
            $table->double('cost')->nullable();
            $table->double('service_fee')->nullable();
            $table->double('overpayment')->nullable();
            $table->double('interest')->nullable();
            $table->double('attorney_fees')->nullable();
            $table->double('percentage_charge')->nullable();//35, 45, 50 if not using client defaults(use key value pairs)
            $table->date('deliquency_date');
            $table->date('received_date');
            $table->string('status')->nullable();
            $table->foreignId('linked_debt_id')->nullable()->constrained('debts', 'id');
            // $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('client_id')->constrained('clients');
            // $table->foreignId('co_debtor_id')->constrained('debtors', 'id');
            // $table->foreignId('co_co_debtor_id')->constrained('debtors', 'id');
            $table->foreignId('collector_id')->constrained('users', 'id');
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
        Schema::dropIfExists('debts');
    }
}
