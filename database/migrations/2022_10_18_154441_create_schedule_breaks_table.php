<?php

use App\Models\EmployeeSchedule;
use App\Models\TimeOffType;
use App\Models\TimeRecordType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleBreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_breaks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('position')->nullable();
            $table->foreignUuid('time_record_type_id')->constrained('time_record_types');
            $table->foreignUuid('employee_schedule_id')->constrained('employee_schedules');
            $table->time('earliest_time_out')->nullable();
            $table->time('latest_time_out')->nullable();
            $table->integer('max_breaks_daily')->default(1);
            $table->double('total_number_of_hours')->nullable();
            $table->unique(['time_record_type_id', 'employee_schedule_id']);
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
        Schema::dropIfExists('schedule_breaks');
    }
}
