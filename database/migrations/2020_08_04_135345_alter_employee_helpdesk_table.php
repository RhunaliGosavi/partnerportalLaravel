<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmployeeHelpdeskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('marketing_visuals')) {
            Schema::table('employee_helpdesk', function (Blueprint $table) {
                $table->boolean('download_flag')->default(false);
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
        Schema::table('employee_helpdesk', function (Blueprint $table) {
            $table->dropColumn('circle');
        });
    }
}
