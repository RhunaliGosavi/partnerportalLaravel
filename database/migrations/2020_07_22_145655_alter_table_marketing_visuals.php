<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMarketingVisuals extends Migration
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
                $table->dropColumn('loan_product_id');
                $table->renameColumn('file_path', 'content_data');
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
            $table->string('loan_product_id')->before('marketing_visual_category_id');
            $table->renameColumn('content_data', 'file_path');
        });
    }
}
