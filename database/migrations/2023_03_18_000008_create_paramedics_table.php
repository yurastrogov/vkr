<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamedicsTable extends Migration
{
    public function up()
    {
        Schema::create('paramedics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surname');
            $table->string('name');
            $table->string('fathername');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}