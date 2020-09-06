<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('id_employee');
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->foreign('idfk_company')->references('id_company')->on('company');
            $table->unsignedBigInteger('idfk_company');
            $table->string('email')->nullable(false);
            $table->string('phone')->nullable(false);
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
        Schema::dropIfExists('employee');
    }
}
