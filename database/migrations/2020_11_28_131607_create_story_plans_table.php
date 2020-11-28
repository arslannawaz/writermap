<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_plans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');

            $table->text('objective')->nullable();
            $table->text('inspiration')->nullable();

            $table->timestamps();
        });

        Schema::create('milestones', function (Blueprint  $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');

            $table->date('due_date');

            $table->string('type');
            $table->string('title');

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
        Schema::dropIfExists('story_plan');
        Schema::dropIfExists('milestones');
    }
}
