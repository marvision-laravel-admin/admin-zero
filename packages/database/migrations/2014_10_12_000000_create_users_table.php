<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthday')->nullable();
            $table->boolean('gender')->default(1);
            $table->boolean('active')->default(0);
            $table->string('img')->default('');

            $table->string('password');
            $table->string('facebook')->nullable()->default('');
            $table->string('twitter')->nullable()->default('');
            $table->string('youtube')->nullable()->default('');
            $table->string('googleplus')->nullable()->default('');
            $table->string('linkedin')->nullable()->default('');
            $table->string('github')->nullable()->default('');

            $table->string('website')->nullable()->default('');
            $table->string('phone')->nullable()->default('');
            $table->string('address')->nullable()->default('');
            $table->string('country')->nullable()->default(''); 
            $table->text('aboutme')->nullable(); 

            $table->ipAddress('ip')->nullable(); 
            $table->time('ping')->nullable();
            $table->boolean('login')->nullable()->default(0);

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
