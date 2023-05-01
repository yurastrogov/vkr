<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDoctorvisitsTable extends Migration
{
    public function up()
    {
        Schema::table('doctorvisits', function (Blueprint $table) {
            $table->unsignedBigInteger('idcontractor_id')->nullable();
            $table->foreign('idcontractor_id', 'idcontractor_fk_8189117')->references('id')->on('contragents');
            $table->unsignedBigInteger('mkb_id')->nullable();
            $table->foreign('mkb_id', 'mkb_fk_8189119')->references('id')->on('mkbs');
        });
    }
}