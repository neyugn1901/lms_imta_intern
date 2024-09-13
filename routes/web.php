<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\InstructorController;
use App\Http\Controllers\Dashboard\UserCategoryController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CartItemController;

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

// Student 
Route::get('student/index', [StudentController::class, 'index'])->name('admin.student.index');
Route::resource('admin/student', StudentController::class);
Route::get('admin/student/{id}/edit', [StudentController::class, 'edit'])->name('admin.student.edit');
Route::get('admin/student/create', [StudentController::class, 'create'])->name('admin.student.create');
Route::post('admin/student/create', [StudentController::class, 'store'])->name('admin.student.store');
Route::delete('admin/student/{id}', [StudentController::class, 'destroy'])->name('admin.student.destroy');
Route::put('admin/student/{id}', [StudentController::class, 'update'])->name('admin.student.update');
Route::get('admin/student/{id}', [StudentController::class, 'show'])->name('admin.student.show');


// Instructor 
Route::get('instructor/index', [InstructorController::class, 'index'])->name('admin.instructor.index');
Route::resource('admin/instructor', InstructorController::class);
Route::get('admin/instructor/{id}/edit', [InstructorController::class, 'edit'])->name('admin.instructor.edit');
Route::get('admin/instructor/create', [InstructorController::class, 'create'])->name('admin.instructor.create');
Route::post('admin/instructor/create', [InstructorController::class, 'store'])->name('admin.instructor.store');
Route::delete('admin/instructor/{id}', [InstructorController::class, 'destroy'])->name('admin.instructor.destroy');
Route::put('admin/instructor/{id}', [InstructorController::class, 'update'])->name('admin.instructor.update');
Route::get('admin/instructor/{id}', [InstructorController::class, 'show'])->name('admin.instructor.show');


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
Route::resource('admin/user_categories', UserCategoryController::class);
Route::get('admin/user_category/{id}/edit', [UserCategoryController::class, 'edit'])->name('admin.user_category.edit');
Route::get('admin/user_category/create', [UserCategoryController::class, 'create'])->name('admin.user_category.create');
Route::post('admin/user_category/create', [UserCategoryController::class, 'store'])->name('admin.user_category.store');
Route::delete('admin/user_category/{id}', [UserCategoryController::class, 'destroy'])->name('admin.user_category.destroy');
Route::put('admin/user_category/{id}', [UserCategoryController::class, 'update'])->name('admin.user_category.update');







//home
Route::get('home/index', [HomeController::class, 'index'])->name('homepage.home.index');
Route::get('/categories', [CategoryController::class, 'showCategories'])->name('categories.show');
Route::get('courses/{id}', [CourseController::class, 'show'])->name('homepage.home.courses_details');


//cart
Route::get('/cart', [ShoppingCartController::class, 'index'])->name('home.cart.index');
Route::post('/cart/add', [ShoppingCartController::class, 'add'])->name('home.cart.add');
Route::post('/cart/clear', [ShoppingCartController::class, 'clearCart'])->name('home.cart.clear');


// Cart Item routes
Route::post('/cart/item/update/{itemId}', [CartItemController::class, 'update'])->name('home.cart.item.update');
Route::delete('/cart/item/delete/{itemId}', [CartItemController::class, 'destroy'])->name('home.cart.item.delete');






Route::get('login', [AuthController::class, 'index'])->name('auth.login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login.submit');
Route::get('register', [AuthController::class, 'viewRegister'])->name('auth.register');
Route::post('register', [AuthController::class, 'register'])->name('auth.register.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');



Route::get('home', [HomeController::class, 'index'])->name('home.index')->middleware('auth.student');
Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index')->middleware('auth.user');

Route::redirect('/', '/auth/login');

