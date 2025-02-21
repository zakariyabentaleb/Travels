<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::get('/index', [QuestionsController::class, 'index'])->name('questions.index');
Route::get('/create', [QuestionsController::class, 'create']);
Route::get('/edit', [QuestionsController::class, 'edit']);
Route::get('questions/{id}', [QuestionsController::class, 'show'])->name('questions.show');

Route::get('/questions/{question}/edit', [QuestionsController::class, 'edit'])->name('questions.edit'); 
Route::put('/questions/{question}', [QuestionsController::class, 'update'])->name('questions.update'); 
Route::get('/questions/create', [QuestionsController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionsController::class, 'store'])->name('questions.store');

Route::post('/questions/{question}/reponses',[AnswersController::class , 'store'])->name('questions.reponsestore');



Route::delete('/questions/{questions}', [QuestionsController::class, 'destroy'])->name('questions.destroy');
require __DIR__.'/auth.php';
