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



Route::resource('/',AuthController::class);
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
Route::get('manage_schools',[AdminController::class,'manageSchools']);
Route::get('create_deo',[AdminController::class,'createDeo']);
Route::get('create_school',[AdminController::class,'createSchool']);
Route::post('create_school',[AdminController::class,'storeSchool']);
Route::get('create_head_teacher',[AdminController::class,'createHeadTeacher']);
Route::post('create_head_teacher',[AdminController::class,'storeHeadTeacher']);
Route::post('create_deo',[AdminController::class,'storeDeo']);
Route::get('manage_deos',[AdminController::class,'manageDeos']);
Route::get('schools',[AdminController::class,'getSchools']);


/*=========DEO routes=============*/
Route::get('deo_dashboard',[DeoController::class,'deoDashboard']);
Route::get('pending_transfer',[DeoController::class,'pendingTransfer']);
Route::get('load_status',[DeoController::class,'load_status']);
Route::post('pending_transfer',[DeoController::class,'status']);
Route::get('districts',[AdminController::class,'districts']);
Route::get('deo_password_reset',[DeoController::class,'changePassword']);
Route::post('deo_password_reset',[DeoController::class,'storeNewPassword']);


/*=========head Teacher routes=============*/
Route::get('head_teacher',[HeadTeacherController::class,'index']);
Route::get('manage_pupil',[HeadTeacherController::class,'pupils']);
Route::get('add_pupil',[HeadTeacherController::class,'addPupil']);
Route::post('add_pupil',[HeadTeacherController::class,'createPupil']);
Route::post('update_status',[HeadTeacherController::class,'update_status']);
Route::get('transfer_requests',[HeadTeacherController::class,'transferRequests']);
Route::get('manage_teacher',[HeadTeacherController::class,'manageTeacher']);
Route::post('manage_teacher',[HeadTeacherController::class,'storeTeacher']);
Route::get('transfer_to',[HeadTeacherController::class,'transferTo']);
Route::get('manage_teachers',[HeadTeacherController::class,'manageTeachers']);
Route::get('head_teacher_reset',[HeadTeacherController::class,'resetPassword']);
Route::post('head_teacher_reset',[HeadTeacherController::class,'storePassword']);

/*========= Teacher routes=============*/
Route::get('teacher',[TeacherController::class,'index']);
Route::get('ca',[TeacherController::class,'ca']);
Route::post('marks',[TeacherController::class,'marks']);


/*========= Pupil routes=============*/
Route::get('pupil_dashboard',[PupilController::class,'index']);
Route::get('pupil_class',[PupilController::class,'class']);
Route::get('pupil_transfer',[PupilController::class,'pupilTransfer']);
Route::post('pupil_transfer',[PupilController::class,'createRequest']);
Route::get('dest_district',[PupilController::class,'destDistrict']);
Route::get('dest_school',[PupilController::class,'destSchool']);
Route::get('transfer_status',[PupilController::class,'transferStatus']);
Route::get('password_reset',[PupilController::class,'passwordReset']);
Route::post('password_reset',[PupilController::class,'storeNewPassword']);

