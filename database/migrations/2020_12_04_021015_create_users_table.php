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
        //create table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gender_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('age');
            $table->boolean('married');
            $table->string('info')->nullable();
            $table->dateTime('birthdate');
            $table->date('current_date');
            $table->time('current_time');
        });

        Schema::table('users', static function (Blueprint $table) {
            $table->foreign('gender_id')->references('id')->on('genders');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', static function (Blueprint $table) {
            $table->dropForeign(['gender_id']);
        });

        Schema::dropIfExists('users');
    }
}
