<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->default();
            $table->string('lastname')->nullable();
            $table->string('avatar');
            $table->string('identity_number');
            $table->string('identity_image');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('birthdate');
            $table->string('address');
            $table->string('gender');
            $table->string('relation_status');
            $table->string('profession');
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
        Schema::dropIfExists('persons');
    }
}
