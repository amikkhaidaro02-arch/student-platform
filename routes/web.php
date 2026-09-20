<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Группа маршрутов только для авторизованных пользователей
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard: передаем все курсы с автором (преподавателем)
    Route::get('/dashboard', function () {
        $courses = Course::with('teacher')->latest()->get();
        return view('dashboard', compact('courses'));
    })->name('dashboard');

    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // CRUD для курсов (index, create, store, show, edit, update, destroy)
    Route::resource('courses', CourseController::class);
});

require __DIR__.'/auth.php';