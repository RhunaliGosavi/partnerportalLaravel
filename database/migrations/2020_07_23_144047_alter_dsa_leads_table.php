<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDsaLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('dsa_leads')) {
            Schema::table('dsa_leads', function (Blueprint $table) {
                $table->string('address_proof_type', 255)->nullable()->after('upi_id');
                $table->string('pan_card_doc', 255)->nullable()->after('address_proof_doc');
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
        Schema::table('dsa_leads', function (Blueprint $table) {
            $table->dropColumn('address_proof_type');
            $table->dropColumn('pan_card_doc');
        });
    }
}
