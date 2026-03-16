<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\MethodologyController;
use App\Http\Controllers\SnapshotController;
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

Route::get('/', [CostController::class, 'index']);
Route::get('/methodology', [MethodologyController::class, 'index']);
Route::get('/snapshots', [SnapshotController::class, 'index']);
Route::get('/snapshots/{date}', [SnapshotController::class, 'show']);

Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'authenticate']);
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'save']);
