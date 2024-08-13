<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ShowController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\Post\PostController;
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

Route::get('/testblog',[ShowController::class,'show']);
Route::get('/postshow',[ShowController::class,'postShow'])->name('post-show');
Route::resource('/language',LanguageController::class);
Route::resource('/post',PostController::class);
Route::get('custom/create/{id}', [PostController::class, 'customCreate'])->name('custom-create');
Route::get('custom/edit/{id}/{lang}', [PostController::class, 'customEdit'])->name('custom-edit');
