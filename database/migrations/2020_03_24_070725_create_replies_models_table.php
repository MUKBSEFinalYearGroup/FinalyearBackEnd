<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Text('message_reply');
            $table->unsignedBigInteger('message_id')->nullable();
            $table->foreign('message_id')->references('id')->on('messages');
            $table->unsignedBigInteger('senders_id')->nullable();
            $table->foreign('senders_id')->references('id')->on('users');
            $table->unsignedBigInteger('recievers_id')->nullable();
            $table->foreign('recievers_id')->references('id')->on('users');
            $table->enum('status',['read','not read'])->default('not read');
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
        Schema::dropIfExists('message_replies');
    }
}
