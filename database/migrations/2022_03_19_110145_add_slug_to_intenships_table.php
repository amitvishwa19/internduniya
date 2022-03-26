<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToIntenshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intenships', function (Blueprint $table) {
            $table->string('slug')->after('title');
            $table->string('qualification')->after('requirement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intenships', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('qualification');
        });
    }
}
