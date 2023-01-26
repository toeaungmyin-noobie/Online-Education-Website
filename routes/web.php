<?php

use App\Http\Controllers\backend\CoursesController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\LessonsController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\HomeController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\PreDec;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/browse-courses', [HomeController::class, 'browseCourses'])->name('frontend.browseCourses');
Route::get('/free-courses', [HomeController::class, 'free_course'])->name('frontend.freeCourse');
Route::get('/course/{id}/outline', [HomeController::class, 'course_outline'])->name('frontend.course.outline');
Route::get('/courses/{id}/detail', [HomeController::class, 'show'])->name('frontend.course-detail');
Route::get('/courses/{id}/lesson/{active_lesson}/detail', [HomeController::class, 'lesson_show'])->name('frontend.lesson-show');
Route::middleware(['auth'])->group(function () {
    Route::post('/courses/enroll-request', [HomeController::class, 'course_entroll'])->name('frontend.enroll-request');
    Route::post('/instructor/request', [HomeController::class, 'instructor_request'])->name('instructor.request');
    Route::get('/profile', [HomeController::class, 'profile'])->name('frontend.profile');
});
// Route for dashboard
Route::middleware(['auth', 'role:admin|instructor'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/for-dashboard', [DashboardController::class, 'data']);
    //routes for users
    Route::get('/users', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::post('/users/update', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('dashboard.users.delete');

    // routes for courses
    Route::get('/courses', [CoursesController::class, 'index'])->name('dashboard.courses');
    Route::get('/courses/{id}/show', [CoursesController::class, 'show'])->name('dashboard.courses.show');
    Route::get('/courses/create', [CoursesController::class, 'create'])->name('dashboard.courses.create');
    Route::post('/courses/store', [CoursesController::class, 'store'])->name('dashboard.courses.store');
    Route::get('/courses/{id}/delete', [CoursesController::class, 'destroy'])->name('dashboard.courses.delete');
    Route::get('/courses/{course_id}/user/{user_id}/remove', [CoursesController::class, 'removeUserFromCourse'])->name('dashboard.courses.remove.user');


    // routes for lessons
    Route::get('/courses/lessons', [LessonsController::class, 'index'])->name('dashboard.lessons');
    Route::get('/courses/lesson/{id}/create', [LessonsController::class, 'create'])->name('dashboard.lessons.create');
    Route::post('/courses/lesson/{course_id}/store', [LessonsController::class, 'store'])->name('dashboard.lessons.store');
    Route::get('/course/{course_id}lessons/{lesson_id}/edit', [LessonsController::class, 'edit'])->name('dashboard.lessons.edit');
    Route::post('/course/lesson/{id}/update', [LessonsController::class, 'update'])->name('dashboard.lessons.update');
    Route::get('/course/lessons/{lesson_id}/delete', [LessonsController::class, 'destroy'])->name('dashboard.lessons.delete');
});
