<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::view('/', 'welcome');
Auth::routes();

//******Admin and Student Routes */

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/student', [LoginController::class,'showStudentLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/student', [RegisterController::class,'showStudentRegisterForm']);

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/student', [LoginController::class,'studentLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/student', [RegisterController::class,'createstudent']);

Route::group(['middleware' => 'auth:student'], function () {
    Route::view('/student', 'student');
});

Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::view('/admin', 'admin');
});

Route::get('logout', [LoginController::class,'logout']);

//*********End */

//*****MCQS SYSTEM ROUTES */
Route::get('/insert',[App\Http\Controllers\QuestionController::class, 'insert'])->name('insert');
Route::post('/create',[App\Http\Controllers\QuestionController::class, 'create'])->name('create');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('show','App\Http\Controllers\ExtraController');

Route::view('test', 'test');