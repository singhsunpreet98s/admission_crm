<?php

use App\Http\Controllers\Admin\AcademicSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CourseFeesController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\MeritListController;
use App\Http\Controllers\Admin\StudentController;
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
Route::prefix('students')->name('students.')->group(function () {
    Route::get('demo', [StudentController::class, 'demo'])->name('demo');
    Route::get('check_application_status', [StudentController::class, 'checkApplicationStatus'])->name('checkApplicationStatus');
    Route::post('verify_application_status', [StudentController::class, 'verifyApplicationStatus'])->name('verifyApplicationStatus');
    Route::post('admission_form', [StudentController::class, 'fillAdmissionForm'])->name('fillAdmissionForm');
    Route::post('save_form', [StudentController::class, 'saveForm'])->name('saveForm');
});
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('index', [AdminController::class, 'index'])->name('index');

    // Courses
    Route::prefix('courses')->name('courses.')->group(function () {
        Route::get('/', [CoursesController::class, 'index'])->name('index');
        Route::get('create', [CoursesController::class, 'create'])->name('create');
        Route::post('store', [CoursesController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CoursesController::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [CoursesController::class, 'update'])->name('update');
        Route::get('do_delete/{id}', [CoursesController::class, 'doDelete'])->name('doDelete');
        Route::delete('delete/{id}', [CoursesController::class, 'delete'])->name('delete');

        // Nested: Course Fees
        Route::prefix('{courseId}/fees')->name('fees.')->group(function () {
            Route::get('/', [CourseFeesController::class, 'index'])->name('index');
            Route::get('create', [CourseFeesController::class, 'create'])->name('create');
            Route::post('store', [CourseFeesController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CourseFeesController::class, 'edit'])->name('edit');
            Route::patch('update/{id}', [CourseFeesController::class, 'update'])->name('update');
            Route::get('do_delete/{id}', [CourseFeesController::class, 'doDelete'])->name('doDelete');
            Route::delete('delete/{id}', [CourseFeesController::class, 'delete'])->name('delete');
        });
    });

    // Categories
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::get('create', [CategoriesController::class, 'create'])->name('create');
        Route::post('store', [CategoriesController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [CategoriesController::class, 'update'])->name('update');
        Route::get('do_delete/{id}', [CategoriesController::class, 'doDelete'])->name('doDelete');
        Route::delete('delete/{id}', [CategoriesController::class, 'delete'])->name('delete');
    });

    // Academic Session
    // Route::prefix('academic_session')->name('academicSession.')->group(function () {
    //     Route::get('/', [AcademicSessionController::class, 'index'])->name('index');
    //     Route::get('create', [AcademicSessionController::class, 'create'])->name('create');
    //     Route::post('store', [AcademicSessionController::class, 'store'])->name('store');
    //     Route::get('edit/{id}', [AcademicSessionController::class, 'edit'])->name('edit');
    //     Route::patch('update/{id}', [AcademicSessionController::class, 'update'])->name('update');
    //     Route::get('do_delete/{id}', [AcademicSessionController::class, 'doDelete'])->name('doDelete');
    //     Route::delete('delete/{id}', [AcademicSessionController::class, 'delete'])->name('delete');
    // });

    // Subjects
    Route::prefix('subjects')->name('subjects.')->group(function () {
        Route::get('/', [SubjectsController::class, 'index'])->name('index');
        Route::get('create', [SubjectsController::class, 'create'])->name('create');
        Route::post('store', [SubjectsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [SubjectsController::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [SubjectsController::class, 'update'])->name('update');
        Route::get('do_delete/{id}', [SubjectsController::class, 'doDelete'])->name('doDelete');
        Route::delete('delete/{id}', [SubjectsController::class, 'delete'])->name('delete');
    });

    // MeritList 
    Route::prefix('merit_list')->name('meritList.')->group(function () {
        Route::get('/', [MeritListController::class, 'index'])->name('index');
        Route::get('create', [MeritListController::class, 'create'])->name('create');
        Route::post('store', [MeritListController::class, 'store'])->name('store');
        Route::get('do_delete/{id}', [MeritListController::class, 'doDelete'])->name('doDelete');
        Route::delete('delete/{id}', [MeritListController::class, 'delete'])->name('delete');
    });
});



Route::get('/sign_out', [ProfileController::class, 'signOut'])->name('signOut');

require __DIR__ . '/auth.php';
