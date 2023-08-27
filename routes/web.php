<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Models\Resume;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboardadmin', [AdminController::class, 'index']);
    Route::get('/managementuser', [AdminController::class, 'managementUser']);
    Route::get('/managementuser/edit/{user}', [AdminController::class, 'managementUserEdit'])->name('edit.user');
    Route::put('/managementuser/update/{user}', [AdminController::class, 'updateUser'])->name('update.user');
    Route::delete('/deleteuser/{user}', [AdminController::class, 'destroyUser'])->name('delete.user');

});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/template', ResumeController::class)->middleware('auth');
Route::get('/dashboard/template/{template}/create', [ResumeController::class, 'create'])->middleware('auth')->name('template.create');
// Route::resource('/dashboard/template2', ResumeController::class)->middleware('auth');
Route::get('/template/{url}', [ResumeController::class, 'show']);
Route::get('/download-resume/{id}', [ResumeController::class, 'downloadResume'])->name('download-resume');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
// Route::get('/profile', [ProfileController::class, 'edit'])->middleware('auth');