<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->string('email')->nullable()->after('description');
            $table->string('primary_contact')->nullable()->after('email');
            $table->string('secondary_contact')->nullable()->after('primary_contact');
            $table->enum('type', ['general','premium'])->default('general')->after('secondary_contact');
            $table->boolean('status')->default(0)->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
