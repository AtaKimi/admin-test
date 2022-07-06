<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentControllerApi;
use App\Http\Controllers\EventControllerApi;
use App\Http\Controllers\JobControllerApi;
use App\Http\Controllers\UserControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  
Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::group(
            ['middleware' => 'jwt.verify'],
            function () {
                Route::post('logout', 'logout');
                Route::post('refresh', 'refresh');
            }
        );
        Route::group(
            ['middleware' => 'guest'],
            function () {
                Route::post('login', 'login');
                Route::post('register', 'register');
            }
        );
    });
});

Route::controller(JobControllerApi::class)->group(function () {
    Route::group(
        ['middleware' => 'jwt.verify'],
        function () {
            Route::post('jobs', 'store');
            Route::put('jobs/{id}', 'update');
        }
    );
    Route::get('jobs', 'index');
    Route::get('jobs/{id}', 'show');
});

Route::controller(CommentControllerApi::class)->group(function () {
    Route::group(
        ['middleware' => 'jwt.verify'],
        function () {
            Route::put('comments/{id}', 'update');
            Route::post('comments', 'store');
        }
    );
    Route::get('comments', 'index');
    Route::get('comments/{id}', 'show');
});

Route::controller(EventControllerApi::class)->group(function () {
    Route::group(
        ['middleware' => 'jwt.verify'],
        function () {
            Route::put('events/{id}', 'update');
            Route::post('events', 'store');
        }
    );
    Route::get('events', 'index');
    Route::get('events/{id}', 'show');
});

Route::controller(UserControllerApi::class)->group(function () {
    Route::get('users', 'index');
    Route::get('users/{id}', 'show');
});
