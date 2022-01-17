<?php

use App\Http\Controllers\MaintenanceController;
use App\Models\Maintenance;
use Illuminate\Support\Facades\Route;

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

// Home route
Route::get('/', function () {
    return view('index');
});

// Login route goes here
Route::get('/login', [LoginController::class, 'index']);

// Admin route goes here
Route::get('/admin', [MaintenanceController::class, 'index']);
