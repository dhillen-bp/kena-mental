<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PsychologistController;
use App\Http\Controllers\QuestionController;

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

Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->middleware('auth');
Route::post('login', [AuthController::class, 'authenticating']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'registerProcess']);

// Client
Route::get('/', [ClientController::class, 'index']);
Route::get('/psychologists', [PsychologistController::class, 'index'])->middleware('auth');
Route::get('/psychologist/{id}', [PsychologistController::class, 'show'])->middleware('auth');

Route::get('/consultations', [ConsultationController::class, 'index'])->middleware('auth');
Route::get('/consultation-detail/{id}', [ConsultationController::class, 'consultDetail'])->middleware('auth');
Route::get('/export-pdf/{id}', [ConsultationController::class, 'exportPDF'])->middleware('auth');
Route::get('/form-consultation/{id_psychologist}', [ConsultationController::class, 'create'])->middleware('auth');
Route::post('/form-consultation', [ConsultationController::class, 'store'])->middleware('auth');

Route::get('/payment-consultation/{id}', [PaymentController::class, 'create'])->middleware('auth');
Route::post('/payment-consultation', [PaymentController::class, 'store'])->middleware('auth');
Route::get('/invoice-consultation/{id}', [PaymentController::class, 'invoice']);

Route::get('/mental-test', [ClientController::class, 'mentalTest'])->middleware('auth');
Route::get('/mental-test/{id}', [QuestionController::class, 'show'])->middleware('auth');
Route::post('/mental-test/result', [QuestionController::class, 'store'])->middleware('auth');
Route::get('/mental-test/result/{user_id}/{completed_at}', [QuestionController::class, 'result'])->middleware('auth')->name('mental-test.result');
Route::get('/test', [QuestionController::class, 'test'])->middleware('auth');

Route::get('/testimonials', [ClientController::class, 'testimonial'])->middleware('auth');


// Login with Github
Route::get('/auth/github/redirect', [AuthController::class, 'redirectToGithubProvider']);
Route::get('/auth/github/callback', [AuthController::class, 'handleGithubProviderCallback']);

// // coba midtrans
// Route::get('/order', [OrderController::class, 'index']);
// Route::post('/checkout', [OrderController::class, 'checkout']);
// // Route::post('/midtrans-callback', [OrderController::class, 'callback']);
// Route::get('/invoice/{id}', [OrderController::class, 'invoice']);


// ADMIN ROUTES
require __DIR__ . '/web_admin.php';
