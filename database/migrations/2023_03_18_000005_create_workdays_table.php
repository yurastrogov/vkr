<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkdaysTable extends Migration
{
    public function up()
    {
        Schema::create('workdays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}