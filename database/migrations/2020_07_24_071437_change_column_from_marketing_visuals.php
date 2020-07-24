<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnFromMarketingVisuals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('marketing_visuals')) {
            Schema::table('marketing_visuals', function (Blueprint $table) {
                $table->longText('content_data')->nullable()->change();
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
        Schema::table('marketing_visuals', function (Blueprint $table) {
            $table->string('content_data')->nullable()->change();
        });
    }
}
