<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\employeController;
use App\Http\Controllers\perusahaanController;
use App\Models\Company;
use App\Models\employe;
use App\Models\Perusahaan;
use App\Mail\companyNotif;
use Illuminate\Support\Facades\Mail;

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
    $allDataCompany = Perusahaan::count();
    $allDataEmploye = employe::count();
    return view('welcome', compact('allDataCompany','allDataEmploye'));
})->middleware('auth');

Route::get('lang/{language}',[LocalizationController::class,'switch'])->name('localization.switch');


Route::get('/login',[loginController::class,'login'])->name('login');
Route::post('/postLogin',[loginController::class,'postLogin'])->name('postLogin');

Route::get('/logout',[loginController::class,'logout'])->name('logout');


Route::resource('employe', employeController::class)->middleware('auth');
Route::resource('perusahaan', perusahaanController::class)->middleware('auth');


