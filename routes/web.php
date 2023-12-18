<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
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

Route::get('/', [CategoryController::class, 'index']);
Route::get('category/create', [CategoryController::class, 'create']);
Route::get('category/{category}', [CategoryController::class, 'show']);
Route::post('category', [CategoryController::class, 'store']);
Route::get('category/{category}/edit', [CategoryController::class, 'edit']);
Route::patch('category/{category}', [CategoryController::class, 'update']);
Route::delete('category/{category}', [CategoryController::class, 'destroy']);

Route::get('test', [MemberController::class, 'test']);


