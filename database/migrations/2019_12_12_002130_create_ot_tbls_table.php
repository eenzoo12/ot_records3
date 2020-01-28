<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_tbls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('department_id');
            $table->date('period_from');
            $table->date('period_to');
            $table->date('date');
            $table->int('shift_sched');
            $table->integer('agency_id');
            $table->string('job_content');
            $table->string('results');
            $table->time('time_from');
            $table->time('time_to');
            $table->integer('time_hrs');
            $table->string('1st_process');
            $table->string('2nd_process');
            $table->string('3rd_process');
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
        Schema::dropIfExists('ot_tbls');
    }
}
