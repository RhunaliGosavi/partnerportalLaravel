<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplicationDisburseDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_disburse_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('application_tbl_id');
            $table->foreign('application_tbl_id')
            ->references('id')
            ->on('employee_application_details')
            ->onDelete('cascade');
            $table->string('application_status');
            $table->double('disbursed_amount');
            $table->timestamp('disbursement_date')->nullable(true);
            $table->timestamp('deleted_at')->nullable(true);
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
        Schema::dropIfExists('application_disburse_details');
    }
}
