<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DebtDebtor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt_debtor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debt_id')->constrained('debts');
            $table->foreignUuid('debtor_uuid')->constrained('debtors');
            $table->string('tag')->default('primary');//primary debtor,co-debtor
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
        Schema::dropIfExists('debt_debtor');
    }
}
