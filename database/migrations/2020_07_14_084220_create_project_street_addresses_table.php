<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStreetAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_street_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->string('home', 255)->nullable();
            $table->string('plot', 255)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('phase', 255)->nullable();
            $table->string('sector', 255)->nullable();
            $table->string('society', 255)->nullable();
            $table->string('city', 255)->nullable();
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
        Schema::dropIfExists('project_street_addresses');
    }
}
