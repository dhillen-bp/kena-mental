<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\Admin\PsychologistController;
use App\Http\Controllers\Psychologist\DashboardController;
use App\Http\Controllers\Admin\PsychologistDetailController;
use App\Http\Controllers\Admin\PaymentConsultationController;
use App\Http\Controllers\Psychologist\ConsultationPsychologistController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginAdmin']);
    Route::post('/login', [AuthController::class, 'processLoginAdmin']);
    Route::get('/register', [AuthController::class, 'showRegisterAdmin']);
    Route::post('/register', [AuthController::class, 'processRegisterAdmin']);

    Route::middleware('auth.admin')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/profile', [AdminController::class, 'showProfile']);
        Route::put('/profile', [AdminController::class, 'updateProfile']);

        Route::get('/show-admin', [AdminController::class, 'show']);
        Route::get('/add-admin', [AdminController::class, 'create']);
        Route::post('/add-admin', [AdminController::class, 'store']);
        Route::get('/edit-admin/{id}', [AdminController::class, 'edit']);
        Route::put('/edit-admin/{id}', [AdminController::class, 'update']);
        Route::delete('/delete-admin/{id}', [AdminController::class, 'destroy']);
        Route::get('/deleted-admins', [AdminController::class, 'showDeletedAdmins']);
        Route::get('/restore-admin/{id}', [AdminController::class, 'restore']);
        Route::delete('/delete-permanent-admin/{id}', [AdminController::class, 'destroyPermanent']);

        Route::get('/psychologists', [PsychologistController::class, 'index']);
        Route::get('/add-psychologist', [PsychologistController::class, 'create']);
        Route::post('/add-psychologist', [PsychologistController::class, 'store']);
        Route::get('/show-psychologist/{id}', [PsychologistController::class, 'show']);
        Route::get('/edit-psychologist/{id}', [PsychologistController::class, 'edit']);
        Route::put('/edit-psychologist/{id}', [PsychologistController::class, 'update']);
        Route::delete('/delete-psychologist/{id}', [PsychologistController::class, 'destroy']);
        Route::get('/deleted-psychologist', [PsychologistController::class, 'showDeletedPsychologists']);
        Route::get('/restore-psychologist/{id}', [PsychologistController::class, 'restore']);
        Route::delete('/delete-permanent-psychologist/{id}', [PsychologistController::class, 'destroyPermanent']);

        Route::get('/detail-psychologist/{id}', [PsychologistDetailController::class, 'edit']);
        Route::put('/detail-psychologist/{id}', [PsychologistDetailController::class, 'update']);

        Route::get('/consultations', [ConsultationController::class, 'index']);
        Route::get('/add-consultation', [ConsultationController::class, 'create']);
        Route::post('/add-consultation', [ConsultationController::class, 'store']);
        Route::get('/show-consultation/{id}', [ConsultationController::class, 'show']);
        Route::get('/edit-consultation/{id}', [ConsultationController::class, 'edit']);
        Route::put('/edit-consultation/{id}', [ConsultationController::class, 'update']);
        Route::delete('/delete-consultation/{id}', [ConsultationController::class, 'destroy']);
        Route::get('/deleted-consultations', [ConsultationController::class, 'showDeletedConsultations']);
        Route::get('/restore-consultation/{id}', [ConsultationController::class, 'restore']);
        Route::delete('/delete-permanent-consultation/{id}', [ConsultationController::class, 'destroyPermanent']);

        Route::get('/detail-consultation/{id}', [PaymentConsultationController::class, 'edit']);
        Route::put('/detail-consultation/{id}', [PaymentConsultationController::class, 'update']);

        Route::get('/testimonials', [TestimonialController::class, 'index']);
        Route::get('/add-testimonial', [TestimonialController::class, 'create']);
        Route::post('/add-testimonial', [TestimonialController::class, 'store']);
        Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'edit']);
        Route::put('/edit-testimonial/{id}', [TestimonialController::class, 'update']);
        Route::delete('/delete-testimonial/{id}', [TestimonialController::class, 'destroy']);
        Route::get('/deleted-testimonials', [TestimonialController::class, 'showDeletedTestimonials']);
        Route::get('/restore-testimonial/{id}', [TestimonialController::class, 'restore']);
        Route::delete('/delete-permanent-testimonial/{id}', [TestimonialController::class, 'destroyPermanent']);

        Route::get('/users', [UserController::class, 'index']);
        Route::get('/add-user', [UserController::class, 'create']);
        Route::post('/add-user', [UserController::class, 'store']);
        Route::get('/edit-user/{id}', [UserController::class, 'edit']);
        Route::put('/edit-user/{id}', [UserController::class, 'update']);
        Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);
        Route::get('/deleted-users', [UserController::class, 'showDeletedUsers']);
        Route::get('/restore-user/{id}', [UserController::class, 'restore']);
        Route::delete('/delete-permanent-user/{id}', [UserController::class, 'destroyPermanent']);
    });

    Route::middleware('auth.psychologist')->group(function () {
        Route::get('/psychologist/logout', [AuthController::class, 'logout']);
        Route::get('/psychologist/profile', [AdminController::class, 'showProfile']);
        Route::put('/psychologist/profile', [AdminController::class, 'updateProfile']);

        Route::get('/psychologist', [DashboardController::class, 'index']);
        Route::get('/psychologist/consultation-upcoming', [ConsultationPsychologistController::class, 'showUpcoming']);
        Route::get('/psychologist/consultation-completed', [ConsultationPsychologistController::class, 'showCompleted']);
        Route::patch('/psychologist/consultation-completed/{id}', [ConsultationPsychologistController::class, 'updateCompleted']);
    });
});
