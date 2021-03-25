<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                  ->unsigned()
                  ->nullable()
                  ->on('users')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('temperature_id')
                  ->unsigned()
                  ->nullable()
                  ->on('temperatures')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('water_id')
                  ->unsigned()
                  ->nullable()
                  ->on('waters')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('turbidity_id')
                  ->unsigned()
                  ->nullable()
                  ->on('turbidities')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('ph_level_id')
                  ->unsigned()
                  ->nullable()
                  ->on('ph_levels')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('feeder_id')
                  ->unsigned()
                  ->nullable()
                  ->on('feeders')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('ponds');
    }
}
