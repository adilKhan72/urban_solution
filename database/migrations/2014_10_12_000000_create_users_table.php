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
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('employee_number', 255)->nullable();
            $table->dateTime('joining_date')->nullable();
            $table->dateTime('leaving_date')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->string('id_card_number', 20)->nullable();
            $table->string('description')->nullable();
            $table->string('profile_pic', 255)->nullable();
            $table->string('idcard_scan', 255)->nullable();
            $table->string('cv_scan', 255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
