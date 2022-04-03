<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('subscribed')->default(0)->after('role');
            $table->date('subscription_date')->after('subscribed')->nullable();
            $table->date('renew_date')->after('subscription_date')->nullable();
            $table->string('plan')->after('renew_date')->nullable();
            $table->integer('action_count')->default(0)->after('plan')->nullable();
            $table->boolean('payment')->default(0)->after('action_count');
            $table->string('amount')->after('payment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('subscribed');
        });
    }
}
