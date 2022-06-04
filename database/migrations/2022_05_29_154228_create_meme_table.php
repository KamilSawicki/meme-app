<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreignUuid('created_by_id')->references('id')->on('users');
            $table->foreignUuid('updated_by_id')->references('id')->on('users');
            $table->foreignUuid('deleted_by_id')->nullable()->references('id')->on('users');
            $table->string('title');
            $table->string('file');
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memes');
    }
};
