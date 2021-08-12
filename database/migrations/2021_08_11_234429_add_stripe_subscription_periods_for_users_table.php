<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStripeSubscriptionPeriodsForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('stripe_subscription_started_at')->after('stripe_subscription')->nullable();
            $table->dateTime('stripe_subscription_ended_at')->after('stripe_subscription_started_at')->nullable();
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
            $table->dropColumn(['stripe_subscription_started_at', 'stripe_subscription_ended_at']);
        });
    }
}
