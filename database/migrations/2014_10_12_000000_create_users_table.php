<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_url',500)->nullable();
            $table->string('card_id',11);
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone',11);
            $table->date('date_of_birth')->nullable();
            $table->integer('age')->nullable();
            $table->text('address')->nullable();
                //Relacion de Users a clubs
            $table->unsignedInteger('club_id')->nullable();
            $table->foreign('club_id')->references('id')->on('clubs');
                //Relacion de Users a Levels
            $table->unsignedInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels');
                //Relacion de Users a Categories
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
                //Relacion de Users a Provincias
            $table->unsignedInteger('province_id')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces');
                //Relacion de Users a relations
            $table->unsignedInteger('relation_id')->nullable();
            $table->foreign('relation_id')->references('id')->on('relations');
                //Relacion de Users a users(para representante)
            $table->unsignedInteger('represented_id')->nullable();
            $table->foreign('represented_id')->references('id')->on('users');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
