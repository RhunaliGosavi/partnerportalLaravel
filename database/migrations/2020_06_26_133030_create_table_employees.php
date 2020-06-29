<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('employee_id');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('pan_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('otp')->nullable();
            $table->string('status')->nullable()->comment('0 => Deactive, 1 => Activate');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
