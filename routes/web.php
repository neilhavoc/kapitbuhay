<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PoliceAccountController;
use App\Http\Controllers\VawAccountController;
use App\Http\Controllers\VictimAccountController;
use App\Http\Controllers\PoliceIncidentController;
use App\Http\Controllers\VawIncidentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PoliceCreateReportController;
use App\Http\Controllers\PoliceDistressController;
use App\Http\Controllers\PoliceManageAccountController;
use App\Http\Controllers\PoliceReportsController;
use App\Http\Controllers\PoliceUnverifiedController;
use App\Http\Controllers\DistressController;
use App\Http\Controllers\RegisterPoliceController;
use App\Http\Controllers\RegisterVawController;
use App\Http\Controllers\VawReportsController;
use App\Http\Controllers\VawUnverifiedController;
use App\Http\Controllers\VawCreateReportController;
use App\Http\Controllers\VawMonitoringController;
use App\Http\Controllers\VawRecordController;
use App\Http\Controllers\VawManageAccountController;
use App\Http\Controllers\PoliceReviewDistressMessageController;
use App\Http\Controllers\VawIncidentBController;
use App\Http\Controllers\VawReportController;
use App\Http\Controllers\VawDistressMessageController;
use App\Http\Controllers\VawReviewDistressMessageController;

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
    return view('pages.loginpage');
});

Route::resource('/loginpage', LoginController::class);
Route::resource('/register', RegisterController::class);
Route::resource('/article', ArticleController::class);
Route::resource('/feedback', FeedbackController::class);
Route::resource('/report', ReportController::class);
Route::resource('/dashboard', DashboardController::class);
Route::resource('/policeAcc', PoliceAccountController::class);
Route::resource('/VawAcc', VawAccountController::class);
Route::resource('/VictimAcc', VictimAccountController::class);
Route::resource('/PoliceReport', PoliceIncidentController::class);
Route::resource('/VawReport', VawIncidentController::class);
Route::resource('/manage_articles', ArticleController::class);
Route::resource('/police_createReports', PoliceCreateReportController::class);
Route::resource('/police_distress', PoliceDistressController::class);
Route::resource('/police_report', PoliceReportsController::class);
Route::resource('/police_manageaccount', PoliceManageAccountController::class);
Route::resource('/distress', DistressController::class);
Route::resource('/register_police', RegisterPoliceController::class);
Route::resource('/register_vaw', RegisterVawController::class);
Route::resource('/vaw_reports', VawReportsController::class);
Route::resource('/vaw_createReports', VawCreateReportController::class);
Route::resource('/vaw_monitoring', VawMonitoringController::class);
Route::resource('/vaw_record', VawRecordController::class);
Route::resource('/vaw_manageaccount', VawManageAccountController::class);
Route::resource('/police_unverified', PoliceUnverifiedController::class);
Route::resource('/vaw_unverified', VawUnverifiedController::class);
Route::resource('/police_reviewdistressmessage', PoliceReviewDistressMessageController::class);
Route::resource('/manage_VawIncidentB', VawIncidentBController::class);
Route::resource('/vaw_report', VawReportController::class);
Route::resource('/vaw_distressmessage', VawDistressMessageController::class);
Route::resource('/vaw_reviewdistressmessage', VawReviewDistressMessageController::class);

