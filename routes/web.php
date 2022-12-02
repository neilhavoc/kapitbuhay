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
use App\Http\Controllers\PoliceDistressController;
use App\Http\Controllers\PoliceManageAccountController;
use App\Http\Controllers\PoliceReportsController;
use App\Http\Controllers\DistressController;
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
Route::resource('/police_distress', PoliceDistressController::class);
Route::resource('/police_report', PoliceReportsController::class);
Route::resource('/police_manageaccount', PoliceManageAccountController::class);
Route::resource('/distress', DistressController::class);

