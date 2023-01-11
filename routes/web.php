<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     if (Auth::check()) return view('/dashboard', [DashboardController::class, "index"])->name('dashboard');
//     return view('auth.login');
// });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    route::get('/', [DashboardController::class, "index"]);
    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');

    // Users routes
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);

    // Folders routes
    Route::get('/folders', [FolderController::class, 'index'])->name('folder.index');
    Route::get('/folders/create', [FolderController::class, 'create'])->name('folder.create');
    Route::get('/folders/edit/{id}', [FolderController::class, 'edit']);
});
