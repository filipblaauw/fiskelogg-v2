<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('fishes', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->uuid('uuid')->nullable();
          $table->integer('user_id')->unsigned();
          $table->date('date')->nullable();
          $table->string('time')->nullable();
          $table->string('species');
          $table->string('river')->nullable();
          $table->string('zone')->nullable();
          $table->integer('weight')->unsigned()->nullable();
          $table->integer('length')->unsigned()->nullable();
          $table->string('bait')->nullable();
          $table->string('line')->nullable();
          $table->decimal('lat', 10, 8)->nullable();
          $table->decimal('lng', 10, 8)->nullable();
          $table->unsignedTinyInteger('waterLevel')->nullable();
          $table->string('waterTemp')->nullable();
          $table->unsignedTinyInteger('sex')->nullable();
          $table->unsignedTinyInteger('wild')->nullable();
          $table->unsignedTinyInteger('lice')->nullable();
          $table->unsignedTinyInteger('released')->nullable();
          $table->string('photo')->nullable();
          $table->text('description')->nullable();
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
        Schema::dropIfExists('fishes');
    }
}
