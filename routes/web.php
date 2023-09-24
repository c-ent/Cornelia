<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\Management\UserManagementController;

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


// Routes for guests
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
});

//Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
});


// Routes for Superadmins
Route::middleware(['auth', 'CheckRole:superadmin'])->group(function () {
    Route::get('/superadmin', [SuperAdminDashboardController::class, 'index'])->name('superadmin.home');
});

// Routes for Admins
Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Routes for Users
Route::middleware(['auth', 'CheckRole:user'])->group(function () {
    Route::get('/user', [HomeController::class, 'userHome'])->name('user.home');
});

//MANAGE USERS
Route::middleware(['auth', 'CheckRole:admin,superadmin'])->group(function () {
    Route::get('/manage/users', [UserManagementController::class, 'users'])->name('user.manage'); //ManageUsersDashboard
    Route::get('/view/user/{id}', [UserManagementController::class, 'details'])->name('user.details'); //ViewUser
    Route::get('/create/user/', [UserManagementController::class, 'create'])->name('user.create'); //Create
    Route::post('/store/user/', [UserManagementController::class, 'store'])->name('user.store');//StoreCreateduser
    Route::get('/edit/user/{id}', [UserManagementController::class, 'edit'])->name('user.edit'); //Edit
    Route::post('/update/user/{id}', [UserManagementController::class, 'update'])->name('user.update');//UpdateEditedUser
    Route::delete('/delete/user/{id}', [UserManagementController::class, 'delete'])->name('user.delete');//Delete
});



