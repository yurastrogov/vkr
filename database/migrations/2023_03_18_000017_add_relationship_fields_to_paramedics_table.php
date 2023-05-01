<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToParamedicsTable extends Migration
{
    public function up()
    {
        Schema::table('paramedics', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user_id')->nullable();
            $table->foreign('id_user_id', 'id_user_fk_8188618')->references('id')->on('users');
            $table->unsignedBigInteger('speciality_id')->nullable();
            $table->foreign('speciality_id', 'speciality_fk_8188643')->references('id')->on('medicpositions');
            $table->unsignedBigInteger('shedule_id')->nullable();
            $table->foreign('shedule_id', 'shedule_fk_8188644')->references('id')->on('shedules');
        });
    }
}