<?php

use App\Http\Controllers\AddSoalController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\UserExamController;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('backEnd.login');
});

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');


Route::middleware([auth::class])->group(
    function () {

        Route::resource('kategori', KategoriController::class);

        // Master
        Route::get('master', [MasterController::class, 'index']);
        Route::get('master/create', [MasterController::class, 'create']);
        Route::post('master', [MasterController::class, 'store'])
            ->name('master.store');
        Route::delete('master', [MasterController::class, 'destroy'])
            ->name('master.destroy');

        // Master -  Add Soal
        Route::get('master/addSoal/{id}', [AddSoalController::class, 'index']);
        Route::get('master/addSoal/create/{id}', [AddSoalController::class, 'create']);
        Route::post('master/addSoal/{id}', [AddSoalController::class, 'store'])
            ->name('addSoal.store');
        Route::delete('master/addSoal', [AddSoalController::class, 'destroy'])
            ->name('addSoal.destroy');


        // Manage User
        Route::resource('manage-user', ManageUserController::class);


        Route::get('dashboard', function () {
            return view('backEnd.layout.home');
        });

        Route::get('dashboard', [UserExamController::class, 'apply_index']);
        Route::get('dashboard/{id}', [UserExamController::class, 'apply_exam']);

        //User Exam
        Route::get('user-exam', [UserExamController::class, 'index']);
        Route::get('user-exam/{id}', [UserExamController::class, 'join_exam']);
        Route::post('user-exam/{id}', [UserExamController::class, 'proses_exam'])
            ->name('proses.exam');


        // Result Delete
        Route::get('result-exam', [UserExamController::class, 'result_index']);
        Route::get('result-exam/{id}', [UserExamController::class, 'result_detail']);
        Route::delete('result-exam/{id}', [UserExamController::class, 'result_destroy'])
            ->name('result.destroy');
    }
);
