<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CollectionIncentiveCalculator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_incentive', function (Blueprint $table) {
          
            $table->bigIncrements('id');
            $table->double('min_resolution');
            $table->double('max_resolution');
            $table->double('min_rollback');
            $table->double('max_rollback');
            $table->double('bkt1');
            $table->double('bkt2');
            $table->double('bkt3');
            $table->double('bkt4');
            $table->string('type');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_incentive');
    }
}
