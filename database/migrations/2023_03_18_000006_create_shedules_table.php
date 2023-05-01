<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShedulesTable extends Migration
{
    public function up()
    {
        Schema::create('shedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->time('worktimestart');
            $table->time('worktimeend');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}