<?php

use App\Http\Controllers\Admin\AcademicSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CourseFeesController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\SubjectsController;
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

    // Acadamic Session
    Route::get('/admin/academic_session', [AcademicSessionController::class, 'index'])->name('admin.academicSession.index');
    Route::get('/admin/academic_session/create', [AcademicSessionController::class, 'create'])->name('admin.academicSession.create');
    Route::post('/admin/academic_session/store', [AcademicSessionController::class, 'store'])->name('admin.academicSession.store');
    Route::get('/admin/academic_session/edit/{id}', [AcademicSessionController::class, 'edit'])->name('admin.academicSession.edit');
    Route::patch('/admin/academic_session/update/{id}', [AcademicSessionController::class, 'update'])->name('admin.academicSession.update');
    Route::get('/admin/academic_session/do_delete/{id}', [AcademicSessionController::class, 'doDelete'])->name('admin.academicSession.doDelete');
    Route::delete('/admin/academic_session/delete/{id}', [AcademicSessionController::class, 'delete'])->name('admin.academicSession.delete');


    // Subjects
    Route::get('/admin/subjects', [SubjectsController::class, 'index'])->name('admin.subjects.index');
    Route::get('/admin/subjects/create', [SubjectsController::class, 'create'])->name('admin.subjects.create');
    Route::post('/admin/subjects/store', [SubjectsController::class, 'store'])->name('admin.subjects.store');
    Route::get('/admin/subjects/edit/{id}', [SubjectsController::class, 'edit'])->name('admin.subjects.edit');
    Route::patch('/admin/subjects/update/{id}', [SubjectsController::class, 'update'])->name('admin.subjects.update');
    Route::get('/admin/subjects/do_delete/{id}', [SubjectsController::class, 'doDelete'])->name('admin.subjects.doDelete');
    Route::delete('/admin/subjects/delete/{id}', [SubjectsController::class, 'delete'])->name('admin.subjects.delete');

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
