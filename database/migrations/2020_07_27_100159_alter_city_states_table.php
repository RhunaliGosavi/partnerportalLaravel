<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCityStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('marketing_visuals')) {
            Schema::table('city_states', function (Blueprint $table) {
                $table->renameColumn('city_name', 'office_city');
                $table->renameColumn('state_name', 'state');
                $table->string('circle', 255)->nullable()->after('pincode');
                $table->string('region', 100)->nullable()->after('circle');
                $table->string('division', 255)->nullable()->after('region');
                $table->string('office_type', 255)->nullable()->after('division');
                $table->string('delivery', 255)->nullable()->after('office_type');
                $table->string('district', 255)->nullable()->after('delivery');
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
        Schema::table('city_states', function (Blueprint $table) {
            $table->renameColumn('office_city', 'city_name');
            $table->renameColumn('state', 'state_name');
            $table->dropColumn('circle');
            $table->dropColumn('region');
            $table->dropColumn('division');
            $table->dropColumn('office_type');
            $table->dropColumn('delivery');
            $table->dropColumn('district');
        });
    }
}
