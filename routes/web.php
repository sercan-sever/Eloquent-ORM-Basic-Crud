<?php

use App\Http\Controllers\CourseController;
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

Route::get('/', function (){
    return view('welcome');
});

Route::prefix('course')->group(function () {

    Route::get('/', [CourseController::class, 'index'])->name('course.index');
    Route::get('create', [CourseController::class, 'create'])->name('course.crate');
    Route::get('edit/{id?}', [CourseController::class, 'edit'])->name('course.edit');
    Route::get('destroy/{id?}', [CourseController::class, 'destroy'])->name('course.destroy');

    Route::any('update/{id?}', [CourseController::class, 'update'])->name('course.update');

    Route::post('store', [CourseController::class, 'store'])->name('course.store');

});
