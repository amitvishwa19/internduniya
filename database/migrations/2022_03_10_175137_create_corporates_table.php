<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecorporatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('employees')->nullable();
            $table->text('address')->nullable();
            $table->enum('type', ['company', 'university'])->default('company');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('corporates');
    }
}
