<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Route voor de homepage
Route::get('/', function () {
    return view('welcome');
});

// Route voor het dashboard (alleen voor geauthenticeerde en geverifieerde gebruikers)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Groep van routes die authenticatie vereisen
Route::middleware('auth')->group(function () {
    // Routes voor het profiel bewerken, updaten en verwijderen
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route voor het uploaden van vragen (alleen toegankelijk voor geauthenticeerde gebruikers)
    Route::get('/upload', function () {
        return view('upload');
    })->name('upload.form');

    // POST route voor het verwerken van de geüploade vragen
    Route::post('/upload/questions', [FileController::class, 'uploadQuestions'])->name('upload.questions');

    // Routes voor het beheren van vragen (alleen toegankelijk voor docenten)
    Route::middleware('teacher')->group(function () {
        Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
        Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

        // Routes voor het beheren van toetsen (alleen toegankelijk voor docenten)
        Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
        Route::get('/tests/create', [TestController::class, 'create'])->name('tests.create');
        Route::post('/tests', [TestController::class, 'store'])->name('tests.store');
        Route::get('/tests/{test}/edit', [TestController::class, 'edit'])->name('tests.edit');
        Route::put('/tests/{test}', [TestController::class, 'update'])->name('tests.update');
        Route::delete('/tests/{test}', [TestController::class, 'destroy'])->name('tests.destroy');
    });
});

// Authentication routes
require __DIR__.'/auth.php';
