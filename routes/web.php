<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CourseFeesController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    // Dashboard
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');

    // Courses
    Route::get('/admin/courses', [CoursesController::class, 'index'])->name('admin.courses.index');
    Route::get('/admin/courses/create', [CoursesController::class, 'create'])->name('admin.courses.create');
    Route::post('/admin/courses/store', [CoursesController::class, 'store'])->name('admin.courses.store');
    Route::get('/admin/courses/edit/{id}', [CoursesController::class, 'edit'])->name('admin.courses.edit');
    Route::patch('/admin/courses/update/{id}', [CoursesController::class, 'update'])->name('admin.courses.update');
    Route::get('/admin/courses/do_delete/{id}', [CoursesController::class, 'doDelete'])->name('admin.courses.doDelete');
    Route::delete('/admin/courses/delete/{id}', [CoursesController::class, 'delete'])->name('admin.courses.delete');

    // Categories
    Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::patch('/admin/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::get('/admin/categories/do_delete/{id}', [CategoriesController::class, 'doDelete'])->name('admin.categories.doDelete');
    Route::delete('/admin/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('admin.categories.delete');

    // Courses
    Route::get('/admin/courses/{courseId}/fees', [CourseFeesController::class, 'index'])->name('admin.courses.fees.index');
    Route::get('/admin/courses/{courseId}/fees/create', [CourseFeesController::class, 'create'])->name('admin.courses.fees.create');
    Route::post('/admin/courses{courseId}/fees/store', [CourseFeesController::class, 'store'])->name('admin.courses.fees.store');
    Route::get('/admin/courses/{courseId}/fees/edit/{id}', [CourseFeesController::class, 'edit'])->name('admin.courses.fees.edit');
    Route::patch('/admin/courses/{courseId}/fees/update/{id}', [CourseFeesController::class, 'update'])->name('admin.courses.fees.update');
    Route::get('/admin/courses/{courseId}/fees/do_delete/{id}', [CourseFeesController::class, 'doDelete'])->name('admin.courses.fees.doDelete');
    Route::delete('/admin/courses/{courseId}/fees/delete/{id}', [CourseFeesController::class, 'delete'])->name('admin.courses.fees.delete');
});


Route::get('/sign_out', [ProfileController::class, 'signOut'])->name('signOut');

require __DIR__ . '/auth.php';
