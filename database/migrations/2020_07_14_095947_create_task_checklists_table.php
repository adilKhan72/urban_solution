<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_checklists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('task_assignment_id');
            $table->string('checked_by_assigned_user_id')->nullable();
            $table->enum('checked_by_assigned_user', ['yes', 'no'])->default('no');
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
        Schema::dropIfExists('task_checklists');
    }
}
