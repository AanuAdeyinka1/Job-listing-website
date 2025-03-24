<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;


use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;





Route::get('/', function (){ return view(view: 'home',);});
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);


Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);


Route::post('/logout', [SessionController::class, 'destroy']);
//You can either group your controller or not like the below examples
//THIS
// Route::resource('jobs',JobController::class);
//OR THIS BELOW

//index
Route::get('/jobs', [JobController::class, 'index']);

//create
Route::get('/jobs/create',[JobController::class, 'create']);

//store
Route::post( '/jobs', [JobController::class, 'store'])->middleware('auth');

//show
Route::get('/jobs/{job}', [JobController::class, 'show']);

//Edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job');

//Update

Route::patch('/jobs/{job}', [JobController::class, 'update']);

//delete
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::get('/contact',function () {
    return view('contact'
);
});
