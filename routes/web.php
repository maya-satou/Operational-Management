<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeProjectController;

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



Auth::routes();

Route::get('/', function () {
   return view('welcome');
 });

//Attendance

Route::get('/attendances', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendances.index');
Route::post('/attendances', [App\Http\Controllers\AttendanceController::class, 'store'])->name('attendances.store');
Route::get('/attendances/create', [App\Http\Controllers\AttendanceController::class, 'create'])->name('attendances.create');
Route::get('/attendances/{attendance}', [App\Http\Controllers\AttendanceController::class, 'show'])->name('attendances.show');
Route::put('/attendances/{attendance}', [App\Http\Controllers\AttendanceController::class, 'update'])->name('attendances.update');
Route::delete('/attendances/{attendance}', [App\Http\Controllers\AttendanceController::class, 'destroy'])->name('attendances.destroy');
Route::get('/attendances/{attendance}/edit', [App\Http\Controllers\AttendanceController::class, 'edit'])->name('attendances.edit');

//Employee
//Route::group(['middleware' => ['auth','admin']], function(){
   //Route::resource('employees',  [App\Http\Controllers\EmployeeController::class]);
    Route::get('/employees',[App\Http\Controllers\EmployeeController::class,'index'])->name('employees.index');
    Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
    Route::get('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');
    Route::put('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('/employees/{employee}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');


//});



//Project
 Route::get('/projects',[App\Http\Controllers\ProjectController::class,'index'])->name('projects.index');
 Route::post('/projects',[App\Http\Controllers\ProjectController::class,'store'])->name('projects.store');
 Route::get('/projects/create',[App\Http\Controllers\ProjectController::class,'create'])->name('projects.create');
 Route::get('/projects/{project}/edit',[App\Http\Controllers\ProjectController::class,'edit'])->name('projects.edit');
 Route::put('/projects/{project}',[App\Http\Controllers\ProjectController::class,'update'])->name('projects.update');
 Route::delete('/projects/{project}',[App\Http\Controllers\ProjectController::class,'destroy'])->name('projects.destroy');

//Skill_Rank
Route::get('/skill\ranks',[App\Http\Controllers\SkillRankController::class,'index'])->name('skill_ranks.index');
 Route::post('/skill_ranks',[App\Http\Controllers\SkillRankController::class,'store'])->name('skill_ranks.store');
 Route::get('/skill_ranks/create',[App\Http\Controllers\SkillRankController::class,'create'])->name('skill_ranks.create');
 Route::get('/skill_ranks/{skill_rank}/edit',[App\Http\Controllers\SkillRankController::class,'edit'])->name('skill_ranks.edit');
 Route::put('/skill_ranks/{skill_rank}',[App\Http\Controllers\SkillRankController::class,'update'])->name('skill_ranks.update');
 Route::delete('/skill_ranks/{skill_rank}',[App\Http\Controllers\SkillRankController::class,'destroy'])->name('skill_ranks.destroy');

//Department
Route::get('/departments',[App\Http\Controllers\departmentController::class,'index'])->name('departments.index');
 Route::post('/departments',[App\Http\Controllers\departmentController::class,'store'])->name('departments.store');
 Route::get('/departments/create',[App\Http\Controllers\departmentController::class,'create'])->name('departments.create');
 Route::get('/departments/{department}/edit',[App\Http\Controllers\departmentController::class,'edit'])->name('departments.edit');
 Route::put('/departments/{department}',[App\Http\Controllers\departmentController::class,'update'])->name('departments.update');
 Route::delete('/departments/{department}',[App\Http\Controllers\departmentController::class,'destroy'])->name('departments.destroy');

//EmployeeProject
Route::get('/employee_projects',[App\Http\Controllers\EmployeeProjectController::class,'index'])->name('employee_projects.index');
 Route::post('/Es',[App\Http\Controllers\EmployeeProjectController::class,'store'])->name('employee_projects.store');
 Route::get('/employee_projects/create',[App\Http\Controllers\EmployeeProjectController::class,'create'])->name('employee_projects.create');
 Route::get('/employee_projects/{employee_project}/edit',[App\Http\Controllers\EmployeeProjectController::class,'edit'])->name('employee_projects.edit');
 Route::put('/employee_projects/{employee_project}',[App\Http\Controllers\EmployeeProjectController::class,'update'])->name('employee_projects.update');
 Route::delete('/employee_projects/{employee_project}',[App\Http\Controllers\EmployeeProjectController::class,'destroy'])->name('employee_projects.destroy');



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
