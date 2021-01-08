<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStripeTokeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('stripe_customer')->nullable()->after('profile_photo_path');
            $table->string('stripe_subscription')->nullable()->after('stripe_customer');
            $table->string('stripe_card')->nullable()->after('stripe_subscription');
            $table->string('stripe_card_last_4')->nullable()->after('stripe_card');
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
            $table->dropColumn(['stripe_customer', 'stripe_subscription', 'stripe_card', 'stripe_card_last_4']);
        });
    }
}
