<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\Admin\PsychologistController;
use App\Http\Controllers\Admin\PsychologistDetailController;


Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginAdmin']);
    Route::post('/login', [AuthController::class, 'processLoginAdmin']);
    Route::get('/register', [AuthController::class, 'showRegisterAdmin']);
    Route::post('/register', [AuthController::class, 'processRegisterAdmin']);

    Route::middleware('auth.admin')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/', [AdminController::class, 'index']);

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

        Route::get('/testimonials', [TestimonialController::class, 'index']);

        Route::get('/users', [UserController::class, 'index']);
    });
});
