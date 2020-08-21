<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReqCusFieldAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('req_cus_field_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requirement_custom_field_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->string('answer', 255);
            $table->text('discription')->nullable();
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
        Schema::dropIfExists('req_cus_field_answers');
    }
}
