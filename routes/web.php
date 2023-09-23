<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;

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


//Home
Route::get('/', [HomeController::class, 'index'])->name('home');


//Routes that need to be accessed by guests
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
});
//Routes that need to be accessed by authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
});


//Routes that need to be accessed by authenticated users with specific roles

//superadmin
Route::middleware(['auth', 'CheckRole:superadmin'])->group(function () {
    Route::get('/superadmin', [SuperAdminDashboardController::class, 'index'])->name('superadmin.home');
    Route::get('/superadmin/edit/admin/{id}', [SuperAdminDashboardController::class, 'index'])->name('admin.edit');
    
    Route::get('/superadmin/view/admin/{id}', [SuperAdminDashboardController::class, 'details'])->name('admin.details');
    Route::get('/superadmin/delete/admin/{id}', [SuperAdminDashboardController::class, 'index'])->name('admin.delete');
}); 
//try

//admin
Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});

//user
Route::middleware(['auth', 'CheckRole:user'])->group(function () {
    Route::get('/user', [HomeController::class, 'userHome'])->name('user.home');
});
