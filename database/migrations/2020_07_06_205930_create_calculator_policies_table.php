<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatorPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculator_policies', function (Blueprint $table) {
            $table->id();
            $table->float('personal_loan_fori');
            $table->float('personal_loan_roi');
            $table->float('loan_against_property_fori');
            $table->float('loan_against_property_ltv');
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
        Schema::dropIfExists('calculator_policies');
    }
}
