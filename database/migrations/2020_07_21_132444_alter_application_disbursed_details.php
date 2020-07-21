<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApplicationDisbursedDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('application_disburse_details')) {
            Schema::table('application_disburse_details', function (Blueprint $table) {
                $table->string('employee_id')->nullable()->after('application_tbl_id');
                $table->string('application_number')->nullable()->after('employee_id');
            });
        }
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
