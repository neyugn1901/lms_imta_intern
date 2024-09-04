<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserCategoryController;


use App\Http\Controllers\Home\HomeController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
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
    return view('welcome'); 
});

//login
Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware(LoginMiddleware::class);
Route::post('login',[AuthController::class, 'login'])->name('auth.login');
//logout
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

//dashboard
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);

//user
Route::get('users/index', [UserController::class, 'index'])->name('admin.users.index');
Route::resource('admin/users', UserController::class);
Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('admin/users/create', [UserController::class, 'store'])->name('admin.users.store');
Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
Route::put('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::get('admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');


//course
Route::get('courses/index', [CourseController::class, 'index'])->name('admin.courses.index');
Route::resource('admin/courses', CourseController::class);
Route::get('admin/courses/{id}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
Route::get('admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
Route::post('admin/courses/create', [CourseController::class, 'store'])->name('admin.courses.store');
Route::delete('admin/courses/{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
Route::put('admin/courses/{id}', [CourseController::class, 'update'])->name('admin.courses.update');
Route::get('admin/courses/{id}', [CourseController::class, 'show'])->name('admin.courses.show');



// Category Routes
Route::get('admin/category/index', [CategoryController::class, 'index'])->name('admin.category.index');
Route::resource('admin/categories', CategoryController::class);
Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('admin/category/create', [CategoryController::class, 'store'])->name('admin.category.store');
Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
Route::put('admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');


// User Category Routes
Route::get('admin/user_category/index', [UserCategoryController::class, 'index'])->name('admin.user_category.index');
Route::resource('admin/categories', UserCategoryController::class);
Route::get('admin/user_category/{id}/edit', [UserCategoryController::class, 'edit'])->name('admin.user_category.edit');
Route::get('admin/user_category/create', [UserCategoryController::class, 'create'])->name('admin.user_category.create');
Route::post('admin/user_category/create', [UserCategoryController::class, 'store'])->name('admin.user_category.store');
Route::delete('admin/user_category/{id}', [UserCategoryController::class, 'destroy'])->name('admin.user_category.destroy');
Route::put('admin/user_category/{id}', [UserCategoryController::class, 'update'])->name('admin.user_category.update');




//register
Route::get('/register', [AuthController::class, 'viewRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register']);

//home
Route::get('home/index', [HomeController::class, 'index'])->name('homepage.home.index');
Route::get('/categories', [CategoryController::class, 'showCategories'])->name('categories.show');






