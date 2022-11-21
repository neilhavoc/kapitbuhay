<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;


use App\Http\Controllers\RegisterController;
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
Route::resource('/account', AccountsController::class);
Route::resource('/article', ArticleController::class);
Route::resource('/feedback', FeedbackController::class);
Route::resource('/report', ReportController::class);
Route::resource('/dashboard', DashboardController::class);

Route::resource('/manage_articles', ArticleController::class);
