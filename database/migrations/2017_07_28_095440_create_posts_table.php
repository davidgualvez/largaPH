<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('vehicle_type_id');
            $table->integer('users_id');
            $table->integer('seats_need');
            $table->integer('bids_id')->nullable();
            $table->string('fromCity');
            $table->string('fromBrgy');
            $table->string('toCity');
            $table->string('toBrgy');
            $table->datetime('departure');
            $table->text('message');
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
        Schema::dropIfExists('posts');
    }
}
