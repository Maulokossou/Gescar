<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('gearbox');
            $table->integer('power');
            $table->integer('door');
            $table->string('fuel');
            $table->integer('cylinder');
            $table->integer('valve');
            $table->integer('maxspeed');
            $table->string('carbody');
            $table->string('transmission');
            $table->string('brake');
            $table->string('acceleration');
            $table->string('color');
            $table->string('photo');
            $table->foreignId('models_id');
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
        Schema::dropIfExists('cars');
    }
}
