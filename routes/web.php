<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Log; // Add this line
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/                                                                                                        

Route::get('/', function () {
    return view('Welcome');
});
Route::get('/test', function () {
    return 'The test route is working';
});


Route::middleware(['auth','admin'])->group(function(){
  Route::get('/uploads/create', [UploadController::class, 'create']);

  Route::post('/uploads', [UploadController::class, 'store'])->name('uploads.store');

  Route::get('/uploads/{upload}/{originalName?}', [UploadController::class, 'show']);
  Route::get('/edit/{upload}', [UploadController::class, 'edit'])->name('uploads.edit');
  Route::put('/update/{upload}', [UploadController::class, 'update'])->name('uploads.update');
  Route::delete('/uploads/{upload}', [UploadController::class, 'destroy']);
 
});
// web.php
Route::get('/view/{upload}', [UploadController::class, 'view'])->name('uploads.view')->middleware('auth','verified');


Route::get('/dashboard',  [UploadController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
