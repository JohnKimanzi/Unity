<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_codes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('is_active')->default(1);//active, deactivacated
            $table->string('text_color')->Default('black');
            $table->string('bg_color')->Default('white');
            $table->boolean('is_blinking')->default(false);
            $table->boolean('is_strike_through')->default(false);
            $table->boolean('is_underline')->default(false);
            $table->boolean('is_bold')->default(false);
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
        Schema::dropIfExists('action_codes');
    }
}
