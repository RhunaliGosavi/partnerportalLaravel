<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_loans', function (Blueprint $table) {
            $table->id();
            $table->integer('source_user_id');
            $table->string('lead_generated_source')->nullable();
            $table->string('employee_id');
            $table->string('name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->float('loan_amount');
            $table->string('designation')->nullable();
            $table->timestamp('prefered_contact_time')->nullable();
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
        Schema::dropIfExists('hr_loans');
    }
}
