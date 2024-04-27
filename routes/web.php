<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');


Route::post('/login-request', [\App\Http\Controllers\AuthController::class, 'login_request'])->name('login_request');
Route::post('/logout-request', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout_request');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\DashBoardController::class, 'index'])->name('dashboard');

    // Routes for Companies
    Route::resource('companies', \App\Http\Controllers\CompanyController::class);

    // Routes for Employees
    Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
});
