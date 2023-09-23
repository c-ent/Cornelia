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
    //HOME
    Route::get('/superadmin', [SuperAdminDashboardController::class, 'index'])->name('superadmin.home');
    //VIEW DETAILS
    Route::get('/view/admin/{id}', [SuperAdminDashboardController::class, 'details'])->name('admin.details');
    //CREATE
    Route::get('/create/admin/', [SuperAdminDashboardController::class, 'create'])->name('admin.create');
    Route::post('/store/admin/', [SuperAdminDashboardController::class, 'store'])->name('admin.store');
    //EDIT AND UPDATE
    Route::get('/edit/admin/{id}', [SuperAdminDashboardController::class, 'edit'])->name('admin.edit');
    Route::post('/update/admin/{id}', [SuperAdminDashboardController::class, 'update'])->name('admin.update');
    //DELETE
    Route::delete('/delete/admin/{id}', [SuperAdminDashboardController::class, 'delete'])->name('admin.delete');
}); 

//admin
Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});

//user
Route::middleware(['auth', 'CheckRole:user'])->group(function () {
    Route::get('/user', [HomeController::class, 'userHome'])->name('user.home');
});


//superadmin
Route::middleware(['auth', 'CheckRole:superadmin,admin'])->group(function () {
    //HOME
    //VIEW DETAILS
    Route::get('/view/user/{id}', [UserManagementController::class, 'details'])->name('user.details');
    //CREATE
    Route::get('/create/user/', [UserManagementController::class, 'create'])->name('user.create');
    Route::post('/store/user/', [UserManagementController::class, 'store'])->name('user.store');
    //EDIT AND UPDATE
    Route::get('/edit/user/{id}', [UserManagementController::class, 'edit'])->name('user.edit');
    Route::post('/update/user/{id}', [UserManagementController::class, 'update'])->name('user.update');
    //DELETE
    Route::delete('/delete/user/{id}', [UserManagementController::class, 'delete'])->name('user.delete');
}); 
