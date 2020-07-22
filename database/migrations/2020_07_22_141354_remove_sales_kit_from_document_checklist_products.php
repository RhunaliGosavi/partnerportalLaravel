<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSalesKitFromDocumentChecklistProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('document_checklist_products')) {
            Schema::table('document_checklist_products', function (Blueprint $table) {
                $table->dropColumn('sales_kit_product_id');
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
        Schema::table('document_checklist_products', function (Blueprint $table) {
            $table->string('sales_kit_product_id')->before('document_checklist_category_id');
        });
    }
}
