<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateintenshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intenships', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('corporate_id');
            $table->bigInteger('user_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->text('requirement')->nullable();
            $table->string('duration')->nullable();
            $table->string('stipend')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('apply_date')->nullable();
            $table->integer('total_opening')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->enum('type', ['wfh', 'fulltime', 'parttime'])->default('fulltime');
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
        Schema::dropIfExists('intenships');
    }
}
