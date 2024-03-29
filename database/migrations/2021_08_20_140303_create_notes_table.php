<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notable_id');
            $table->string('notable_type');
            $table->foreignId('user_id')->constrained('users');
            $table->string('subject');
            $table->string('note');
            $table->timestamps();
            $table->softDeletes();
        });//Appying  polymorphic relationship(notable_id, notable_type)
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
