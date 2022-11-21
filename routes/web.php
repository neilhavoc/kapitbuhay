<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ArticleController;

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;


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
    return view('layouts.index');
});
Route::resource('/controller', LoginController::class);

Route::resource('/account', AccountsController::class);
Route::resource('/article', ArticleController::class);
Route::resource('/feedback', FeedbackController::class);
Route::resource('/dashboard', DashboardController::class);
