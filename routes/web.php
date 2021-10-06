<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\ProfileController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//display list doctor
Route::resource('/', HomepageController::class);
Route::get('/', [HomepageController::class,'index']);
Route::get('/search', [HomepageController::class,'search']);

//display user choose specific doctor
Route::get('/booking/{doctorId}',[HomepageController::class,'show'])->name('booking');
//store booking
Route::post('/booking/appointment',[HomepageController::class,'store'])->name('userAppointment');


//update profile user
Route::resource('/user-profile',ProfileController::class);
Route::post('/user-profile-update',[ProfileController::class,'update']);

//get booking details
Route::get('/myBooking',[HomepageController::class,'myBooking']);
Route::get('/BookingDetails/{appointmentsId}',[HomepageController::class,'BookingDetails']);

Route::resource('/admin', doctorController::class);

//checkout
// Route::

