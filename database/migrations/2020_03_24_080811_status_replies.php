<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusReplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('viewers_id')->nullable();
            $table->unsignedBigInteger('status_file')->nullable();
            $table->foreign('viewers_id')->references('id')->on('users');
            // $table->foreign('status_file')->references('id')->on('chat_statuses');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->enum('status',['active','deleted'])->default('active');
            $table->enum('chat_status',['active','seen','muted'])->default('active');
            $table->enum('category',['image','Text','Audio','Video'])->default('text');
            $table->text('reply_message');
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
        Schema::dropIfExists('status_replies');
    }
}
