<?php

use App\Enums\Role;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolFeeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/student/login', [PageController::class, 'login'])->name('guest.login');
Route::post('/student/login', [PageController::class, 'authentication'])->name('guest.auth');
Route::post('/student/logout', [PageController::class, 'logout'])->name('guest.logout');
Route::get('/student/{student}/history', [PageController::class, 'history'])->name('guest.history');


Route::middleware('auth')->group(function () {
    Route::get('/', [PageController::class, 'index'])
        ->name('dashboard');

    Route::get('payment/{student}', [PaymentController::class, 'index'])
        ->name('payment.index');

    Route::get('payment/{student}/print', [PaymentController::class, 'print'])
        ->name('payment.print');

    Route::post('payment/{student}', [PaymentController::class, 'store'])
        ->name('payment.store');

    Route::get('payment/{student}/create', [PaymentController::class, 'create'])
        ->name('payment.create');

    Route::resource('student', StudentController::class)
        ->middleware('role:' . Role::ADMIN->value)
        ->except(['show']);

    Route::resource('grade', GradeController::class)
        ->middleware('role:' . Role::ADMIN->value)
        ->except(['show']);

    Route::resource('staff', StaffController::class)
        ->middleware('role:' . Role::ADMIN->value)
        ->except(['show']);

    Route::resource('fee', SchoolFeeController::class)
        ->middleware('role:' . Role::ADMIN->value)
        ->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
