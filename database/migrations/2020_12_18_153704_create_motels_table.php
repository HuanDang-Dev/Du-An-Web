<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('like');
            $table->integer('rating');
            $table->integer('area');
            $table->integer('count_view');
            $table->string('address');
            $table->string('phone'); 
            $table->integer('approve')->default(0); 
            $table->string('images');
            $table->integer('user_id');
            $table->integer('district_id');
            $table->string('utilities');
            $table->string('slug'); 
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
        Schema::dropIfExists('motels');
    }
}
