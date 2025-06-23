<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

// Rotas administrativas protegidas por autenticação
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Cursos
    Route::resource('courses', CourseController::class);
    
    // Turmas
    Route::resource('classes', ClassController::class);
    
    // Alunos
    Route::resource('students', StudentController::class);
    
    // Matrículas
    Route::resource('enrollments', EnrollmentController::class);
});

// Rota de redirecionamento após login
Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
})->name('home');