<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeContoller;
use App\Http\Controllers\LeavetypeController;
use App\Http\Controllers\LeavedatesController;
use App\Http\Controllers\PendingleavesController;
use App\Http\Controllers\ApprovedleavesController;
use App\Http\Controllers\DeclinedleavesController;
use App\Http\Controllers\ChangepasswordController;
use App\Http\Controllers\AddadminController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HolidayController;

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
  
Artisan::call('optimize');
Artisan::call('cache:clear');

    return view('welcome');
});

   

Route::get('/', [CustomAuthController::class, 'index'])->name('login');


Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');


Route::group(['middleware' => ['web']], function() {
	Route::post('admin/login',[AdminController::class,'submit_login']);
Route::get('admin/login',[AdminController::class,'login']);



Route::get('admin/logout',[LogoutController::class,'logout']);


Route::resource('admin',AdminController::class);


Route::resource('depart',DepartmentController::class);

Route::get('depart/{id}/delete',[DepartmentController::class,'destroy']);

//employee 
Route::resource('employee',EmployeeContoller::class);
Route::get('employee/{id}/delete',[EmployeeContoller::class,'destroy']);


//holidays
Route::resource('holiday',HolidayController::class);
Route::get('holiday/{id}/delete',[HolidayController::class,'destroy']);

//leavetype
Route::resource('leavetype',LeavetypeController::class);
Route::get('leavetype/{id}/delete',[LeavetypeController::class,'destroy']);


//leavedates
Route::resource('leavedates',LeavedatesController::class);
Route::resource('pending',PendingleavesController::class);
Route::resource('approved',ApprovedleavesController::class);
Route::resource('declined',DeclinedleavesController::class);


Route::get('change-password',[ChangepasswordController::class, 'index']);
Route::post('change-password',[ChangepasswordController::class, 'changePassword'])->name('change.password');;


Route::resource('addadmin',AddadminController::class);
// Route::post('change-password', 'ChangepasswordController@changePassword')->name('change.password');
   




});