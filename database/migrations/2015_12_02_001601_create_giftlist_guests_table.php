<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftlistGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giftlist_guests', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('giftlist_id')->unsigned();
            $table->foreign('giftlist_id')->references('id')->on('giftlists')->onDelete('cascade');

            $table->string('email');
            $table->integer('guestid');
            $table->string('guest_name');
            $table->string('giving_to');
//            $table->boolean('has_given');
//            $table->boolean('has_received');

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
        Schema::drop('giftlist_guests');
    }
}
