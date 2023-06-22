<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//login
Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::middleware('auth:api', 'applicant')->group(function () {

    //job posts
    Route::get('/users/{user}/job-postings', 'App\Http\Controllers\JobPostingController@index');
    Route::get('/users/{user}/job-postings/{jobPosting}', 'App\Http\Controllers\JobPostingController@show');
    Route::post('/users/{user}/job-postings', 'App\Http\Controllers\JobPostingController@store');
    Route::patch('/users/{user}/job-postings/{jobPosting}', 'App\Http\Controllers\JobPostingController@update');
    Route::delete('/users/{user}/job-postings/{jobPosting}', 'App\Http\Controllers\JobPostingController@delete');

    //applications
    Route::get('/users/{user}/applications', 'App\Http\Controllers\ApplicationController@index');
    Route::get('/users/{user}/applications/{application}', 'App\Http\Controllers\ApplicationController@show');
    Route::post('/users/{user}/applications', 'App\Http\Controllers\ApplicationController@store');
    Route::patch('/users/{user}/applications/{application}', 'App\Http\Controllers\ApplicationController@update');
    Route::delete('/users/{user}/applications/{application}', 'App\Http\Controllers\ApplicationController@delete');

});

