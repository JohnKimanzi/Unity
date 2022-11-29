<?php

use App\Models\TransactionType;
use Illuminate\Support\Str;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid as UuidUuid;

class CreateTransactionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->boolean('is_reduce_balance');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        TransactionType::upsert([
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Credit Card', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Credit Card - Processing Fee', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Bank Deposit', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Bank Levy', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Cash', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Check', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Debtor Portal', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Paid Directly To Client (BC)', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Paid Directly To Client (CPU)', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Wage Garnishment', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Additional Collection Fees', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => "Attorney's Fees", 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Client Interest Fee', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Collection Placement Fee', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Court/Legal Fees', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Unused Legal Fees', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Credit Card Chargeback', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Late Payment Fee', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'NSF Check Fee', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Postage', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Remainder of Judgment', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Sheriff/Process Service Fee', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Recurring Auto Payment', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payments Made', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Equipment Returned', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Bank Wire Transfer', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Payment - Client', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'CLIENT OFFSET', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'ACH - Transaction', 'is_reduce_balance'=>1],
            ['id'=> Str::uuid()->toString(), 'name' => 'Waive - Per Client', 'is_reduce_balance'=>1],
        ],['name'],['is_reduce_balance', 'description']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_types');
    }
}
