<?php

use App\Http\Controllers\{CandidateController, CandidateMemberController, GradeController, HomeController, UserController, VoteController};
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admindfhdfhsu', [HomeController::class, 'admin'])->name('admin.index');

    Route::middleware('adminRole')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('users.index');
            Route::get('create', [UserController::class, 'create'])->name('users.create');
            Route::post('', [UserController::class, 'store'])->name('users.store');
            Route::get('{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('{user}', [UserController::class, 'destroy'])->name('users.destroy');
        });

        Route::prefix('grades')->group(function () {
            Route::get('', [GradeController::class, 'index'])->name('grades.index');
            Route::get('create', [GradeController::class, 'create'])->name('grades.create');
            Route::get('{grade}', [GradeController::class, 'show'])->name('grades.show');
            Route::post('', [GradeController::class, 'store'])->name('grades.store');
            Route::get('{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit');
            Route::put('{grade}', [GradeController::class, 'update'])->name('grades.update');
            Route::delete('{grade}', [GradeController::class, 'destroy'])->name('grades.destroy');

            Route::post('{grade}/generate', [GradeController::class, 'generate'])->name('grades.users.generate');
            Route::get('{grade}/export', [GradeController::class, 'export'])->name('grades.users.export');
        });

        Route::prefix('candidates')->group(function () {
            Route::get('', [CandidateController::class, 'index'])->name('candidates.index');
            Route::get('create', [CandidateController::class, 'create'])->name('candidates.create');
            Route::get('{candidate}/show', [CandidateController::class, 'show'])->name('candidates.show');
            Route::post('', [CandidateController::class, 'store'])->name('candidates.store');
            Route::get('{candidate}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');
            Route::put('{candidate}', [CandidateController::class, 'update'])->name('candidates.update');
            Route::delete('{candidate}', [CandidateController::class, 'destroy'])->name('candidates.destroy');
        });

        Route::prefix('candidate-members')->group(function () {
            Route::get('{candidate}/create', [CandidateMemberController::class, 'create'])->name('candidate-members.create');
            Route::post('{candidate}', [CandidateMemberController::class, 'store'])->name('candidate-members.store');
            Route::get('{candidateMember}/edit', [CandidateMemberController::class, 'edit'])->name('candidate-members.edit');
            Route::put('{candidateMember}', [CandidateMemberController::class, 'update'])->name('candidate-members.update');
            Route::delete('{candidateMember}', [CandidateMemberController::class, 'destroy'])->name('candidate-members.destroy');
        });

        Route::prefix('votes')->group(function () {
            Route::get('live-counting', [VoteController::class, 'live'])->name('votes.live');
        });
    });

    Route::middleware('studentRole')->group(function () {
        Route::prefix('votes')->group(function () {
            Route::get('', [VoteController::class, 'index'])->name('votes.index');
            Route::post('{candidate}', [VoteController::class, 'store'])->name('votes.store');
        });
    });
});
