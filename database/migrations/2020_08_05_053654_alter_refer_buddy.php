<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterReferBuddy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('refer_buddy')) {
            Schema::table('refer_buddy', function (Blueprint $table) {
                $table->string('relation_with_customer_id', 255)->nullable()->after('mobile_number');
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
        Schema::table('refer_buddy', function (Blueprint $table) {

            $table->dropColumn('relation_with_customer_id');

        });
    }
}
