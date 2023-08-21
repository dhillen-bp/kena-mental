<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestimonialController;
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

Route::get('/consultations', [ConsultationController::class, 'index'])->middleware('auth');
Route::get('/consultation-detail/{id}', [ConsultationController::class, 'consultDetail'])->middleware('auth');
Route::get('/export-pdf/{id}', [ConsultationController::class, 'exportPDF'])->middleware('auth');
Route::get('/form-consultation/{id_psychologist}', [ConsultationController::class, 'create'])->middleware('auth');
Route::post('/form-consultation', [ConsultationController::class, 'store'])->middleware('auth');

Route::get('/payment-consultation/{id}', [PaymentController::class, 'create'])->middleware('auth');
Route::post('/payment-consultation', [PaymentController::class, 'store'])->middleware('auth');
Route::get('/invoice-consultation/{id}', [PaymentController::class, 'invoice']);

Route::get('/mental-test', [ClientController::class, 'mentalTest'])->middleware('auth');

Route::get('/testimonials', [ClientController::class, 'testimonial'])->middleware('auth');

Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->middleware('auth');
Route::post('login', [AuthController::class, 'authenticating']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'registerProcess']);

// Login with Github
Route::get('/auth/github/redirect', [AuthController::class, 'redirectToGithubProvider']);
Route::get('/auth/github/callback', [AuthController::class, 'handleGithubProviderCallback']);

// coba midtrans
Route::get('/order', [OrderController::class, 'index']);
Route::post('/checkout', [OrderController::class, 'checkout']);
// Route::post('/midtrans-callback', [OrderController::class, 'callback']);
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);


// ADMIN
Route::get('/admin/login', [AuthController::class, 'showLoginAdmin']);
Route::post('/admin/login', [AuthController::class, 'processLoginAdmin']);
Route::get('/admin/register', [AuthController::class, 'showRegisterAdmin']);
Route::post('/admin/register', [AuthController::class, 'processRegisterAdmin']);
Route::get('/admin/logout', [AuthController::class, 'logout'])->middleware('auth.admin');

Route::get('/admin/psychologists', [PsychologistController::class, 'showAdmin'])->middleware('auth.admin');
Route::get('/admin/consultations', [ConsultationController::class, 'showAdmin'])->middleware('auth.admin');
Route::get('/admin/testimonials', [TestimonialController::class, 'showAdmin'])->middleware('auth.admin');
Route::get('/admin/users', [UserController::class, 'showAdmin'])->middleware('auth.admin');

Route::get('/admin/', [AdminController::class, 'index'])->middleware('auth.admin');
