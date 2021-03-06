<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomnotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customnotification', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('visitor_id');
            $table->string('visitor_name');
            $table->string('img');
            $table->string('data');
            $table->string('read');
            $table->string('type');
            $table->string("post_id")->nullable();
            $table->string("comment_id")->nullable();
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
        Schema::dropIfExists('customnotification');
    }
}
