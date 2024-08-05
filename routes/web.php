<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Attendance

Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
Route::get('/attendances/create', [App\Http\Controllers\AttendanceController::class, 'create'])->name('attendances.create');
Route::get('/attendances/{attendance}', [App\Http\Controllers\AttendanceController::class, 'show'])->name('attendances.show');
Route::patch('/attendances/{attendance}', [App\Http\Controllers\ItemController::class, 'update'])->name('attendances.update');
Route::delete('/attendancesm/{attendance}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('attendances.destroy');
Route::get('/attendances/{attendance}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('attendances.edit');



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
