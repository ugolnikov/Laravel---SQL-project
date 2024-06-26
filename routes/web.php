<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
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
    Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');

    Route::get('/students', [StudentsController::class, 'students_show'])->name('students');

    Route::get('/students/create', [StudentsController::class, 'student_form'])->name('student_form');
    Route::post('/students/create/input', [StudentsController::class, 'student_create'])->name('student.input');

    Route::get('/students/class/{class_id}', [StudentsController::class, 'studentsByClass'])->name('students.byClass');


    Route::get('/teachers', [TeacherController::class, 'show'])->name('teachers');
    Route::put('/teachers/update/{id}', [TeacherController::class, 'update'])->name('teachers.update');

    Route::get('/reports', [ReportController::class, 'reports'])->name('reports');
        

    Route::get('/feedback', function() {
        return view('feedback');
    })->name('feedback');

    Route::post('/feedback/send', [StudentsController::class,'feedback_send']);
});


require __DIR__.'/auth.php';
