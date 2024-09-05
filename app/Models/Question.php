<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Definieer de tabelnaam als deze niet automatisch wordt afgeleid
    protected $table = 'questions';

    // Specificeer de velden die massaal toewijsbaar zijn
    protected $fillable = [
        'question_text',
        'question_type',
        'options',
        'correct_answer',
    ];

    // Definieer de data types voor de attributen als dat nodig is
    protected $casts = [
        'options' => 'array',  // Als je 'options' als JSON hebt opgeslagen
    ];
}
