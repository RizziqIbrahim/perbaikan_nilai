<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
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
    return view('welcome');
});

Route::get('/home', [DataController::class, 'index']);
Route::get('create', [DataController::class, 'create'])->name('create');
Route::post('add-data', [DataController::class, 'store'])->name('add-data');
Route::get('create64', [DataController::class, 'create64'])->name('create64');
Route::post('base64', [DataController::class, 'base64'])->name("base64");