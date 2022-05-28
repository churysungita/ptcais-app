<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\DeoController;
use \App\Http\Controllers\HeadTeacherController;
use \App\Http\Controllers\TeacherController;
use App\Http\Controllers\PupilController;

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



Route::resource('auth',AuthController::class);
//Route::get('manage_regions',[AdminController::class]);

Route::get('manage_regions', function () {
    return view('dashboard.admin.manage_regions');
});
    /*
    =========== AUTH==================
    */

/*
 * ==============Admins routes==========
 */
Route::get('admin_dashboard',[AdminController::class,'adminDashboard']);
Route::get('deo_details',[AdminController::class,'deoDetails']);
Route::get('head_teachers_details',[AdminController::class,'headTeachersDetails']);
Route::get('manage_regions',[AdminController::class,'manageRegions']);
Route::get('manage_districts',[AdminController::class,'manageDistricts']);
Route::get('manage_head_teachers',[AdminController::class,'manageHeadTeachers']);
Route::get('manage_schools',[AdminController::class,'manageSchools']);
Route::get('manage_deos',[AdminController::class,'manageDeos']);


/*=========DEO routes=============*/
Route::get('dashboard',[DeoController::class,'deoDashboard']);
Route::get('pending_transfer',[DeoController::class,'pendingTransfer']);
Route::get('load_status',[DeoController::class,'load_status']);
Route::post('pending_transfer',[DeoController::class,'status']);


/*=========head Teacher routes=============*/
Route::get('head_teacher',[HeadTeacherController::class,'index']);
Route::get('manage_pupil',[HeadTeacherController::class,'pupils']);
Route::get('add_pupil',[HeadTeacherController::class,'addPupil']);
Route::post('add_pupil',[HeadTeacherController::class,'createPupil']);
Route::post('update_status',[HeadTeacherController::class,'update_status']);
Route::get('transfer_requests',[HeadTeacherController::class,'transferRequests']);

/*========= Teacher routes=============*/
Route::get('teacher',[TeacherController::class,'index']);


/*========= Pupil routes=============*/
Route::get('pupil_dashboard',[PupilController::class,'index']);
Route::get('pupil_class',[PupilController::class,'class']);
Route::get('pupil_transfer',[PupilController::class,'pupilTransfer']);
Route::post('pupil_transfer',[PupilController::class,'createRequest']);
Route::get('transfer_status',[PupilController::class,'transferStatus']);

