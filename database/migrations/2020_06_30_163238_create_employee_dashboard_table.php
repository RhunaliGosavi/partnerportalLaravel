<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_application_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_name');
            $table->string('employee_id');
            $table->string('application_number');
            $table->string('customer_name');
            $table->string('product_type');
            $table->string('application_status');
            $table->double('applied_amount');
            $table->double('sanctioned_amount');
            $table->double('disbursed_amount');
            $table->timestamp('application_login_date')->nullable(true);
            $table->timestamp('sanctioned_date')->nullable(true);
            $table->timestamp('declined_date')->nullable(true);
            $table->timestamp('disbursement_date')->nullable(true);
            $table->string('sales_officer_name');
            $table->string('sales_supervisors_name');
            $table->string('sourcing_location');
            $table->string('sourcing_agency');
            $table->timestamp('deleted_at')->nullable(true);
            $table->timestamps();
            $table->unique(['employee_id', 'application_number'],'empId_appId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_application_details');
    }
}
