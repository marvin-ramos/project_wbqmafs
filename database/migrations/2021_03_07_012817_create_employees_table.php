<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->unsignedBigInteger('gender_id')
                  ->unsigned()
                  ->nullable()
                  ->on('genders')
                  ->onDelete('cascade');
            $table->string('age');
            $table->date('birthday');
            $table->string('contact_number');
            $table->unsignedBigInteger('status_id')
                  ->unsigned()
                  ->nullable()
                  ->on('statuses')
                  ->onDelete('cascade');
            $table->text('address');
            $table->string('profile');
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
        Schema::dropIfExists('employees');
    }
}
