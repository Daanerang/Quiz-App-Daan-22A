<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('games', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->json('choices')->nullable(); // store player choices in JSON format
        $table->json('items')->nullable(); // store items the player has picked up
        $table->string('current_stage')->default('intro'); // track current stage in the game
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
