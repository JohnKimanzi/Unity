<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ssn')->unique();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('personal_email')->nullable()->unique();
            $table->string("phone1")->unique();
            $table->string("phone2")->nullable()->unique();
            $table->date("dob");
            $table->string("gender");
            $table->double('pay_rate');
            $table->date('doj');
            $table->foreignId("designation_id")->nullable()->constrained('designations');
            //  $table->foreignId("department_id")->nullable()->constrained('departments');
            $table->foreignId("country_id")->constrained('countries');
            $table->string("address");
            $table->string("city");
            $table->foreignId("state_id")->constrained('states');
            $table->string("zip_code");
            $table->foreignId("team_id")->nullable()->constrained('teams');
            $table->foreignId("supervisor_id")->nullable()->constrained('users');
            $table->boolean('status')->default('true');
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('password_changed_at')->nullable();
            $table->boolean('password_status')->default(false);
            $table->foreignUuid('employee_schedule_id')->nullable()->constrained('employee_schedules');
            // more fields as we go
            /*
                city
                town
                country
                department
                designation
            */
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
        Schema::dropIfExists('users');
    }
}
