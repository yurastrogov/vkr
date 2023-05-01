<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContragentsTable extends Migration
{
    public function up()
    {
        Schema::table('contragents', function (Blueprint $table) {
            $table->unsignedBigInteger('insurance_id')->nullable();
            $table->foreign('insurance_id', 'insurance_fk_8188793')->references('id')->on('insurances');
            $table->unsignedBigInteger('insertion_id')->nullable();
            $table->foreign('insertion_id', 'insertion_fk_8188802')->references('id')->on('lpus');
        });
    }
}