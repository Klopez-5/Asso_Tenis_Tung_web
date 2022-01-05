<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('afiche_url',500)->nullable();
            $table->string('name');
            $table->string('site');
            $table->string('address')->nullable();
            $table->date('date')->nullable();
            $table->string('state');
            $table->string('cost')->nullable();
            $table->text('description')->nullable();
            $table->string('type_of_tournament');
            $table->string('reglamento_url',500)->nullable();
            $table->string('protocolo_url',500)->nullable();
            $table->string('resultados_url',500)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('tournaments');
    }
}
