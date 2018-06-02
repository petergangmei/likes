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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('date');
            $table->string('month');
            $table->string('year');
            $table->string('zodiac')->default('null');
            $table->string('friends')->default('0');
            $table->string('bio')->nullable();;
            $table->string('profile_image')->default('null');
            $table->string('coins')->default('50');
            $table->string('profile_visits')->default('0');
            $table->string('coffeeTea')->nullable();
            $table->string('softdrinksHarddrinks')->nullable();
            $table->string('vegNonveg')->nullable();
            $table->string('bikeCar')->nullable();
            $table->string('summerWinter')->nullable();
            $table->string('dayNight')->nullable();
            $table->string('catDog')->nullable();
            $table->string('familyFriends')->nullable();
            $table->string('movie')->nullable();
            $table->string('sleepHours')->nullable();
            $table->string('password');
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
