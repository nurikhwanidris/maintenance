<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaintenanceController;
use App\Models\Maintenance;

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
Route::get('/',[MaintenanceController::class,'home']);

// Login route goes here
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

// Admin route goes here
Route::get('/admin', [MaintenanceController::class, 'index'])->middleware('auth');

// Notice route goes here
Route::get('/admin/notice/add', [MaintenanceController::class, 'create'])->middleware('auth');

Route::get('/admin/notice/list', [MaintenanceController::class, 'list'])->middleware('auth');

Route::post('/admin/notice/store', [MaintenanceController::class, 'store'])->middleware('auth');

Route::get('/admin/notice/view/{id}', [MaintenanceController::class, 'notice'])->middleware('auth');

Route::get('/admin/notice/{maintenance}/edit', [MaintenanceController::class, 'show'])->middleware('auth');

Route::post('/admin/notice/update/{maintenance}', [MaintenanceController::class, 'update'])->middleware('auth');

// Services Route
Route::get('/admin/service/add', [MaintenanceController::class, 'addServices'])->middleware('auth');

Route::post('/admin/service/store', [MaintenanceController::class, 'storeServices'])->middleware('auth');
