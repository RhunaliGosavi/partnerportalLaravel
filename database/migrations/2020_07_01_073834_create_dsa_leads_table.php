<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsaLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsa_leads', function (Blueprint $table) {
            $table->id();
            $table->integer('source_user_id');
            $table->string('lead_generated_source')->nullable();
            $table->string('name')->nullable();
            $table->string('pan_number')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('bank_acc_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('upi_id')->nullable();
            $table->string('address_proof_doc')->nullable();
            $table->string('address_type')->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->string('pincode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('agency_name')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('office_mobile_number')->nullable();
            $table->string('office_email')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('dsa_leads');
    }
}
