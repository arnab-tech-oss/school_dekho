<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Student\QueryController;
use App\Http\Controllers\Student\StudentActivityController;
use App\Http\Controllers\Student\StudentDashboardController;
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/


Route::get('/student', function () {
    dd('Welcome to manager user routes.');
});

Route::group(['namespace'=>'Student','middleware'=>['auth','is_Student']], function (){
    Route::get('student/home',[StudentDashboardController::class,'index'])->name('student.home');
    Route::get('student/logout', [LogoutController::class,'perform'])->name('student.logout');
    Route::get('student/query/{id}',[QueryController::class,'allQuery'])->name('student.query');
    Route::get('student/changepass',[StudentActivityController::class,'changepass'])->name('student.password.view');
    Route::post('student/changepassword',[StudentActivityController::class,'changepassword'])->name('student.password.update');
    Route::get('student/changedetail/{id}',[StudentActivityController::class,'studentdetails'])->name('student.detail');
    Route::post('student/updatedetail',[StudentActivityController::class,'studentupdatedetails'])->name('student.detail.update');
    Route::get('student/history/list/{id}',[StudentActivityController::class,'studenthistory'])->name('student.history.list');

    Route::get('student/admission/lucky_draw',[StudentActivityController::class,'lucky_draw_apply'])->name('student.admission.lucky_draw');
});
