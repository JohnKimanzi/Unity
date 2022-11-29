<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pto_type_id')->constrained('pto_types');
            $table->foreignId('user_id')->constrained('users');
            $table->string('status')->default('new');
            $table->dateTime('start_at');
            $table->foreignId('modified_by_user_id')->nullable()->constrained('users', 'id');
            $table->dateTime('end_at')->nullable();
            $table->string('comments')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('ptos');
    }
}
