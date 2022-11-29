<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoDebtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_debtors', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('debtor_uuid')->constrained('debtors');
            $table->foreignId('debt_id')->constrained('debts');
            $table->foreignId('status')->nullable();
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
        Schema::dropIfExists('co_debtors');
    }
}
