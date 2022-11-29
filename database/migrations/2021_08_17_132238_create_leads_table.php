<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string("name");	
            $table->foreignId("business_type_id")->constrained('business_types');
            $table->string("phone1");
            $table->string("phone2");	
            $table->string("email");	
            $table->foreignId("state_id")->constrained('states');
            $table->string("town");
            $table->string("zip_code");
            $table->string("address");
            $table->string("status");
            $table->foreign("closer_id")->nullable()->constrained('users','id');
            $table->foreign("sales_rep_id")->nullable()->constrained('users','id');
            $table->date('date_onboarded');

            // $table->foreignId('closer_id')->constrained('users');
            // $table->foreignId('sales_rep_id')->constrained('users');
            $table->foreign("company_id")->constrained('companies');
            $table->timestamps();
            $table->softDeletes();
            //source of lead
            //fax
            //mailing address
            // We will add more fields as advised by the client
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
