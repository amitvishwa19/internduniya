<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned()->after('id');
            $table->text('requirement')->nullable()->after('name');
            $table->text('description')->nullable()->after('requirement');
            $table->text('message')->nullable()->after('description');
            $table->date('start_date')->nullable()->after('message');
            $table->date('end_date')->nullable()->after('start_date');
            $table->string('rate')->nullable()->after('end_date');
            $table->enum('price_type', ['hourly','daily','fix'])->default('fix')->after('rate');
            $table->enum('invoice_time', ['10','15','30'])->default('10')->after('price_type');
            $table->enum('invoice', ['pending','paid'])->default('pending')->after('invoice_time');
            $table->enum('priority', ['high','medium','low'])->default('medium')->after('invoice');
            $table->integer('completion_status')->default(0)->after('priority');
            $table->enum('status', ['planning','started','wip','completed'])->default('planning')->after('completion_status');
            $table->text('notes')->nullable()->nullable()->after('completion_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
