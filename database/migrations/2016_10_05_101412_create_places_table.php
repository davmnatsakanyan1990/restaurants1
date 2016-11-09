<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile');
            $table->string('name');
            $table->longText('intro');
            $table->string('address');
            $table->integer('location_id')->unsigned();
            $table->string('lat');
            $table->string('lon');
            $table->string('site');
            $table->enum('cost', [0,1,2,3,4]);
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
        Schema::disableForeignKeyConstraints();
        Schema::drop('places');
    }
}
