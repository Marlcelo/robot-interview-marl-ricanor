<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RobotController;

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


Route::get('/', [RobotController::class, '__construct']);
Route::get('/home', function () {
    return view('simulatorEnv');
})->name('home');
Route::post('/simulate', [RobotController::class, 'pushText'])->name('simulate');
Route::post('/reset', [RobotController::class, 'resetSession'])->name('resetSession');
