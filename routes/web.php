<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaintenanceController;

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
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

// Admin route goes here
Route::get('/admin', [MaintenanceController::class, 'index'])->middleware('auth');

// Notice route goes here
Route::get('/admin/notice/add', [MaintenanceController::class, 'create'])->name('add');
Route::get('/admin/notice/list', [MaintenanceController::class, 'show'])->name('list');
Route::get('/admin/notice/add', [MaintenanceController::class, 'create'])->name('add');
