<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable(true)->after('id')->change();

            $table->string('first_name')->nullable(true)->after('email');
            $table->string('last_name')->nullable(true)->after('first_name');
            $table->string('pen_name')->nullable(true)->after('last_name');
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
            $table->string('name')->nullable(false)->change();

            $table->dropColumn('first_name');
            $table->dropColumn('last_name');

            $table->dropColumn('pen_name');
        });
    }
}
