<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteForTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('breakdowns', function (Blueprint $table) {
            $table->dropForeign('breakdowns_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });

        Schema::table('chapters', function (Blueprint $table) {
            $table->dropForeign('chapters_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });

        Schema::table('character_attributes', function (Blueprint $table) {
            $table->dropForeign('character_attributes_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            $table->dropForeign('character_attributes_character_id_foreign');
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
        });


        Schema::table('character_groups', function (Blueprint $table) {
            $table->dropForeign('character_groups_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });

        Schema::table('characters', function (Blueprint $table) {
            $table->dropForeign('characters_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            $table->dropForeign('characters_group_id_foreign');
            $table->foreign('group_id')->references('id')->on('character_groups')->onDelete('cascade');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });

        Schema::table('event_items', function (Blueprint $table) {
            $table->dropForeign('event_items_event_id_foreign');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });

        Schema::table('milestones', function (Blueprint $table) {
            $table->dropForeign('milestones_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });

        Schema::table('milestones', function (Blueprint $table) {
            $table->dropForeign('milestones_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });

        Schema::table('story_plans', function (Blueprint $table) {
            $table->dropForeign('story_plans_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('breakdowns', function (Blueprint $table) {
            $table->dropForeign('breakdowns_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('chapters', function (Blueprint $table) {
            $table->dropForeign('chapters_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('character_attributes', function (Blueprint $table) {
            $table->dropForeign('character_attributes_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');

            $table->dropForeign('character_attributes_character_id_foreign');
            $table->foreign('character_id')->references('id')->on('characters');
        });


        Schema::table('character_groups', function (Blueprint $table) {
            $table->dropForeign('character_groups_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('characters', function (Blueprint $table) {
            $table->dropForeign('characters_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');

            $table->dropForeign('characters_group_id_foreign');
            $table->foreign('group_id')->references('id')->on('character_groups');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('event_items', function (Blueprint $table) {
            $table->dropForeign('event_items_event_id_foreign');
            $table->foreign('event_id')->references('id')->on('events');
        });

        Schema::table('milestones', function (Blueprint $table) {
            $table->dropForeign('milestones_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('milestones', function (Blueprint $table) {
            $table->dropForeign('milestones_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('story_plans', function (Blueprint $table) {
            $table->dropForeign('story_plans_book_id_foreign');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }
}
