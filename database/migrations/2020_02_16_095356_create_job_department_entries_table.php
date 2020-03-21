<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobDepartmentEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_department_entries', function (Blueprint $table) {
            $table->bigIncrements('jobDepartmentEntryId');
            $table->string('jobDepartmentName');
            $table->string('jobDepartmentStatus');
            $table->integer('createBy');
            $table->integer('updateBy')->nullable();
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
        Schema::dropIfExists('job_department_entries');
    }
}
