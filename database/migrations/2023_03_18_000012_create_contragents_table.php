<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContragentsTable extends Migration
{
    public function up()
    {
        Schema::create('contragents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surname');
            $table->string('name');
            $table->string('fathername')->nullable();
            $table->date('berthday');
            $table->string('gender');
            $table->string('address');
            $table->string('telephone')->nullable();
            $table->string('snils')->nullable();
            $table->string('polis');
            $table->string('spasport')->nullable();
            $table->string('npasport')->nullable();
            $table->string('pasportvudan')->nullable();
            $table->date('datepasport')->nullable();
            $table->string('codepasport')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}