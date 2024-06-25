<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/about', function() {
        return view('about');
    })->name('about');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', [StudentsController::class, 'students_show'])->name('students');

    Route::get('/students/create', [StudentsController::class, 'student_form']);
    Route::post('/students/create/input', [StudentsController::class, 'student_create'])->name('student.input');

    Route::get('/students/class/{class_id}', [StudentsController::class, 'studentsByClass'])->name('students.byClass');


    



    Route::get('/feedback', function() {
        return view('feedback');
    })->name('feedback');

    Route::post('/feedback/send', [StudentsController::class,'feedback_send']);
});


require __DIR__.'/auth.php';
