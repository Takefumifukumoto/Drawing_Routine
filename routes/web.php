<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Project_UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SceneController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//プロジェクト作成画面
Route::get('/create', [ProjectController::class, 'create'])->name('create');

//プロジェクト作成
Route::post('/projects', [ProjectController::class, 'store']);

//プロジェクト編集画面
Route::get('/projects/{project}/edit', [ProjectController::class ,'edit']);

//プロジェクト閲覧
Route::get('/projects/{project}/record', [UserController::class ,'history']);

//プロジェクト閲覧
Route::get('/projects/{project}', [ProjectController::class ,'show']);

Route::post('/projects/{project}', [ProjectController::class ,'show']);

//シーン作成画面
Route::post('/scenes', [ProjectController::class ,'scene_create']);

//シーン作成
Route::post('/scenes/store', [SceneController::class ,'store']);
