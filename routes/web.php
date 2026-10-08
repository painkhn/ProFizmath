<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('/user/{id}', 'index')->name('profile.index');
    Route::post('/profile/update_avatar', 'updateAvatar')->name('profile.update_avatar');
});

Route::controller(CourseController::class)->group(function() {
    Route::get('/course/{title}', 'index')->name('course.index');
    Route::get('/courses', 'list')->name('course.list');
    Route::post('/course/store', 'store')->name('course.store');
    Route::get('/course/edit/{id}', 'edit')->name('course.edit');
    Route::patch('/course/edit/{id}/update', 'update')->name('course.update');
    Route::delete('/course/delete/{id}', 'destroy')->name('course.destroy');
    Route::patch('/course/restore/{id}', 'restore')->name('course.restore');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'index')->name('admin.index');
    Route::patch('/admin/user/{user}/addTeacher', 'addTeacher')->name('admin.add_teacher');
    Route::patch('/admin/user/{user}/makeStudent', 'makeStudent')->name('admin.make_student');
});

Route::controller(SubjectController::class)->group(function() {
    Route::post('/subject/store', 'store')->name('subject.store');
});

Route::controller(CartController::class)->group(function() {
    Route::get('/cart', 'index')->name('cart.index');
});

require __DIR__.'/auth.php';
