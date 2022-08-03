<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patients_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('appointment_date')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->string('status')->nullable();
            $table->text('message',500)->nullable();
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
        Schema::dropIfExists('appointments');
    }
};
