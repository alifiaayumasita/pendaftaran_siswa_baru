<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Route for the "redirects" page
Route::get('/redirects', [HomeController::class, "index"]);
Route::get('/get-cities/{provinsiId}', 'HomeController@index');

// Admin Routes (commented out)
// Route::get('/admin/makemitra', [AdminController::class, 'showMitraPage'])->name('admin.makemitra');
// Route::post('/addmitra', [AdminController::class, "addmitra"]);

// Route for user 
Route::post('/addnewuser', [HomeController::class, "addnewuser"]);
Route::get('/edit_user/{id}', [HomeController::class, 'editUser'])->name('edit_user');
Route::put('/update_user/{id}', [HomeController::class, 'updateUser'])->name('update_user');
Route::delete('/delete_user/{id}', [HomeController::class, 'deleteUser'])->name('delete_user');

// Route for student 
Route::post('/addnewstudent', [HomeController::class, 'addnewstudent'])->name('addnewstudent');
Route::get('/edit_student/{id}', [HomeController::class, 'editStudent'])->name('edit_student');
Route::put('/students/update/{id}', [HomeController::class, 'updateStudent'])->name('update_student');
Route::delete('/delete_student/{id}', [HomeController::class, 'deleteStudent'])->name('delete_student');

// Authenticated Routes Group
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard Route for authenticated users
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/add_new_user', function () {
        return view('admin.add_new_user');
    })->name('admin.add_new_user');
    
    Route::get('/add_new_student', function () {
        return view('student.add_new_student');
    })->name('student.add_new_student');
});
