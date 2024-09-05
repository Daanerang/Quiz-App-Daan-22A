<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_text');  // Veld voor de vraagtekst
            $table->string('question_type');  // Veld voor het type vraag ("multiple_choice" of "open")
            $table->json('options')->nullable();  // Veld voor multiple choice opties, opgeslagen als JSON
            $table->string('correct_answer');  // Veld voor het juiste antwoord
            $table->timestamps();  // Timestamp velden: created_at en updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
