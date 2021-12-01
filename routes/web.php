<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//Route::get('/student/add',[StudentController::class,'StudentAdd'])->name('student.add');
Route::post('/student/store',[StudentController::class,'StudentStore'])->name('student.store');
//Route::get('/student/view',[StudentController::class,'StudentView'])->name('student.view');
Route::get('/student/view',[StudentController::class,'StudentVeiw'])->name('student.veiw');
Route::get('/student/edit/{id}',[StudentController::class,'StudentEdit'])->name('student.edit');
Route::post('/student/update',[StudentController::class,'StudentUpdate'])->name('student.update');

Route::get('/student/delete/{id}',[StudentController::class,'StudentDelete'])->name('student.delete');
Route::prefix('teacher')->group(function(){
    Route::get('/view',[TeacherController::class,'Teacherview'])->name('teacher.veiw');
    Route::post('/store',[TeacherController::class,'TeacherStore'])->name('teacher.store');
}) ;
Route::get('full-calender', [EventController::class,'index']);
Route::get('modal', [HomeController::class,'index']);


// // fdg
// Route::get('students', [AjaxController::class, 'index']);
// Route::post('students', [AjaxController::class, 'store']);
// Route::get('fetch-students', [AjaxController::class, 'fetchstudent']);
// Route::get('edit-student/{id}', [AjaxController::class, 'edit']);
// Route::put('update-student/{id}', [AjaxController::class, 'update']);
// Route::delete('delete-student/{id}', [AjaxController::class, 'destroy']);
// Route::view('/products','products');
// Route::post('/save',[ProductController::class,'save'])->name('save.product');
// Route::get('/fetchProducts',[ProductController::class,'fetchProducts'])->name('fetch.products');
Route::get('/employee', [AjaxController::class, 'index']);
Route::post('/employee', [AjaxController::class, 'store']);
