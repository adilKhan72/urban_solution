<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->smallInteger('city_id')->nullable();
            $table->smallInteger('country_id')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->default('other');
            $table->string('phone', 15)->nullable();
            $table->date('dob')->nullable();
            $table->json('address')->nullable();
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
        Schema::dropIfExists('user_information');
    }
}
