<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::create('locations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customers_id');
        $table->unsignedBigInteger('cars_id');
        $table->foreign('customers_id')->references('id')
                                        ->on('customers')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
         $table->foreign('cars_id')->references('id')
                                        ->on('cars')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
        $table->date('startDate');
        $table->date('expectedReturnDate');
        $table->date('effectiveReturnDate')->nullable();
        $table->string('observation')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
