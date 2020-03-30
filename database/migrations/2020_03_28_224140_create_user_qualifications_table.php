<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('educational_degree_id');
            $table->string('organisation');
            $table->text('description')->nullable();
            $table->smallInteger('marks');
            $table->enum('marks_type', ['gpa', 'percentage'])->default('percentage');
            $table->dateTime('from_date');
            $table->dateTime('to_date');
            $table->string('transcript_scan', 255)->nullable();
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
        Schema::dropIfExists('user_qualifications');
    }
}
