<?php

use App\Http\Controllers\JobsController;
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

Route::get('/jobs', [JobsController::class,'index'])->name("jobindex");;
Route::get('/create' , [JobsController::class,'create'])->name("createjob");
Route::post('/store', [JobsController::class,'store'])->name("storejob");
Route::get('/edit/{id}', [JobsController::class,'edit'])->name("editjob");
Route::post('/update/{id}', [JobsController::class,'update'])->name("updatejob");
Route::get('/delete/{id}', [JobsController::class,'destroy'])->name("deletejob");
Route::post('/ajax_search', [JobsController::class,'ajax_search'])->name("ajax_search_job");