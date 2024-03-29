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
            $table->unsignedInteger('blood_group_id')->nullable();;
            $table->unsignedInteger('city_id')->nullable();;
            $table->unsignedInteger('country_id')->nullable();;
            $table->enum('gender', ['male', 'female', 'other'])->default('other');
            $table->string('phone', 15)->nullable();
            $table->date('dob')->nullable();
            $table->json('primary_address')->nullable();
            $table->json('languages')->nullable();
            $table->json('secondary_address')->nullable();
            $table->json('google_location_pin')->nullable();

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
