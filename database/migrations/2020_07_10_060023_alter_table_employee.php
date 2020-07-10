<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('employees')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->string('hub_name')->nullable()->after('otp');
                $table->string('company_name')->nullable()->after('hub_name');
                $table->string('work_location')->nullable()->after('company_name');
                $table->string('state')->nullable()->after('work_location');
                $table->string('department')->nullable()->after('state');
                $table->string('designation')->nullable()->after('department');
                $table->string('job_role')->nullable()->after('designation');
                $table->string('product')->nullable()->after('job_role');
                $table->string('middle_name')->nullable()->after('name');
                $table->string('last_name')->nullable()->after('middle_name');
                $table->string('reporting_manager_name')->nullable()->after('product');
                $table->string('manager_employee_id')->nullable()->after('reporting_manager_name');
                
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
        //
    }
}
