<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorvisitsTable extends Migration
{
    public function up()
    {
        Schema::create('doctorvisits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('complaint')->nullable();
            $table->longText('objectivestat')->nullable();
            $table->longText('treatment')->nullable();
            $table->datetime('datetimepriem')->nullable();
            $table->string('visitpurpose')->nullable();
            $table->string('rezultatvisit')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}