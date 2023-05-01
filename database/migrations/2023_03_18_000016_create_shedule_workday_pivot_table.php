<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheduleWorkdayPivotTable extends Migration
{
    public function up()
    {
        Schema::create('shedule_workday', function (Blueprint $table) {
            $table->unsignedBigInteger('shedule_id');
            $table->foreign('shedule_id', 'shedule_id_fk_8188606')->references('id')->on('shedules')->onDelete('cascade');
            $table->unsignedBigInteger('workday_id');
            $table->foreign('workday_id', 'workday_id_fk_8188606')->references('id')->on('workdays')->onDelete('cascade');
        });
    }
}