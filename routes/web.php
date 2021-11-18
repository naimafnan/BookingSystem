<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientListTodayController;
use App\Http\Controllers\listAllPatientController;
use App\Http\Controllers\PatientListExpiredController;
use App\Http\Controllers\myBookingController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


//route for admin and doctor
Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index']);
//display list doctor
Route::resource('/', HomepageController::class);
Route::get('/', [HomepageController::class,'index']);
Route::get('/search', [HomepageController::class,'search']);

//display user choose specific doctor
Route::get('/booking/{doctorId}',[HomepageController::class,'show'])->name('booking');
// Route::get('/time/{doctorId}',[HomepageController::class,'timeslot'])->name('booking');
//store booking
Route::post('/booking/appointment',[HomepageController::class,'store'])->name('userAppointment');


//update profile user
Route::resource('/user-profile',ProfileController::class);
Route::post('/user-profile-update',[ProfileController::class,'update']);

//get booking details
Route::get('/myBooking',[myBookingController::class,'index']);
Route::post('/booking-cancel',[myBookingController::class,'update']);
Route::get('/BookingDetails/{appointmentsId}',[HomepageController::class,'BookingDetails']);

Route::post('/getTime',[HomepageController::class,'getTime'])->name('getTime');

Route::resource('/doctor', doctorController::class);
Route::resource('/admin', AdminController::class);

Route::resource('/patientToday',PatientListTodayController::class);
Route::post('/patientToday-update',[PatientListTodayController::class,'update']);
Route::post('/patientToday-cancel',[PatientListTodayController::class,'cancelBooking']);

Route::resource('/allPatient',listAllPatientController::class);
Route::post('/allPatient-update',[listAllPatientController::class,'update']);
Route::post('/allPatient-cancel',[listAllPatientController::class,'cancelBooking']);

Route::resource('/expired',PatientListExpiredController::class);

Route::post('/doctor-update',[doctorController::class,'update'])->name('schedule');

