<?php

use App\Http\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardCourseController;
use App\Http\Controllers\DashboardMateriController;
use App\Http\Controllers\DashboardCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('checkRole:admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/verify', [LoginController::class, 'verify']);

Route::get('/block', [LoginController::class, 'block']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/admin/member', DashboardUserController::class)->middleware('checkRole:admin');
Route::resource('/admin/user', DashboardAdminController::class)->middleware('checkRole:admin');

Route::resource('/admin/category', DashboardCategoryController::class)->middleware('checkRole:admin');

Route::resource('/admin/course', DashboardCourseController::class)->middleware('checkRole:admin');
Route::resource('/admin/materi', DashboardMateriController::class)->middleware('checkRole:admin');

// Route::get('/materi/{id}', [DashboardMateriController::class, 'indexMateri']);

Route::get('/course', [CourseController::class, 'index']);

Route::get('/course/{id}', [courseController::class, 'show']);




