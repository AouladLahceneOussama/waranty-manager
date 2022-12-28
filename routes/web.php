<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/clients', fn () => view('client.index'))->name('client.index');

    // Folders routes
    Route::get('/folders', fn () => view('folder.index'))->name('folder.index');
    Route::get('/folders/create', fn () => view('folder.create'))->name('folder.create');
    Route::get('/folders/edit/{id}', fn ($folderId) => view('folder.edit',['folderId'=>$folderId]));
    // Route::get('/folders/', function($id) {  
    //     return  view('folder.edit',["id"=>$id]);
    //  });
   
});
