<?php
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



use App\Http\Controllers\CandidateController;

Route::get('/profile/{id}', [CandidateController::class, 'show'])->name('profile.show');
Route::post('/profile/{id}', [CandidateController::class, 'update'])->name('profile.update');


use App\Http\Controllers\Auth\CandidateAuthController;

Route::get('candidate/register', [CandidateAuthController::class, 'showRegisterForm'])->name('candidate.register');
Route::post('candidate/register', [CandidateAuthController::class, 'register']);
Route::get('candidate/login', [CandidateAuthController::class, 'showLoginForm'])->name('candidate.login');
Route::post('candidate/login', [CandidateAuthController::class, 'login']);
