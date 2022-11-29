<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_people', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('lead_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('salutation');
            $table->string('contact_type');
            $table->string('email')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('contact_people');
    }
}
