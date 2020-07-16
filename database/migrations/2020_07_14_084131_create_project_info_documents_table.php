<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectInfoDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_info_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->string('nic_scan', 255)->nullable();
            $table->string('allotment_letter_scan', 255)->nullable();
            $table->string('fard_scan', 255)->nullable();
            $table->string('asc_scan', 255)->nullable();
            $table->string('company_document_scan', 255)->nullable();
            $table->string('pec_number', 255)->nullable();
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
        Schema::dropIfExists('project_info_documents');
    }
}
