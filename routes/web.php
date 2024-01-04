<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TossController;
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
Route::get('category/{category}/teams/list', [CategoryController::class, 'showTeams']);
Route::get('category/{category}/members/list', [CategoryController::class, 'showMembers']);
Route::post('category', [CategoryController::class, 'store']);
Route::get('category/{category}/edit', [CategoryController::class, 'edit']);
Route::patch('category/{category}', [CategoryController::class, 'update']);
Route::delete('category/{category}', [CategoryController::class, 'destroy']);

Route::get('team/create', [TeamController::class, 'create']);
Route::get('team/{team}', [TeamController::class, 'show']);
Route::post('team', [TeamController::class, 'store']);
Route::get('team/{team}/edit', [TeamController::class, 'edit']);
Route::patch('team/{team}', [TeamController::class, 'update']);
Route::delete('team/{team}', [TeamController::class, 'destroy']);


Route::get('member/create', [MemberController::class, 'create']);
Route::post('member', [MemberController::class, 'store']);
Route::get('member/{member}/edit', [MemberController::class, 'edit']);
Route::patch('member/{member}', [MemberController::class, 'update']);
Route::patch('member/{member}/status', [MemberController::class, 'updateStatus']);
Route::delete('member/{member}', [MemberController::class, 'destroy']);

Route::get('category/{category}/toss/create', [TossController::class, 'create']);




