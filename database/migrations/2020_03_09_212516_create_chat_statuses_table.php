<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status',['active','expired'])->default('active');
            $table->unsignedBigInteger('viewers_id')->nullable();
            $table->unSignedBigInteger('created_by')->nullable();
            $table->enum('chat_status',['active','seen','muted'])->default('active');
            $table->string('status_file');
            $table->enum('category',['image','video','text'])->default('text');
            $table->foreign('viewers_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('chat_statuses');
    }
}
