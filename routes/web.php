<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PsychologistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Client
Route::get('/', [ClientController::class, 'index']);
Route::get('/psychologists', [PsychologistController::class, 'index'])->middleware('auth');
Route::get('/psychologist/{id}', [PsychologistController::class, 'show'])->middleware('auth');
Route::post('/psychologist/{id}', [PsychologistController::class, 'choosePsychologist'])->middleware('auth');

Route::get('/consultations', [ConsultationController::class, 'index'])->middleware('auth');
Route::get('/consultation-detail/{id}', [ConsultationController::class, 'consultDetail'])->middleware('auth');
Route::get('/form-consultation/{id_psychologist}', [ConsultationController::class, 'create'])->middleware('auth');
Route::get('/process-consultation', [ConsultationController::class, 'store'])->middleware('auth');
Route::get('/export-pdf/{id}', [ConsultationController::class, 'exportPDF'])->middleware('auth');

Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->middleware('auth');

Route::get('/dashboard', function () {
    return 'Anda login sebagai ' . auth()->user()->email;
})->middleware('auth');

Route::get('/auth/github/redirect', [AuthController::class, 'redirectToGithubProvider']);
Route::get('/auth/github/callback', [AuthController::class, 'handleGithubProviderCallback']);
