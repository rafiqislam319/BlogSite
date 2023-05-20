<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RelatedPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);

//crud for category
Route::middleware('auth:sanctum')->post('category/create', [CategoryController::class, 'store']);
Route::middleware('auth:sanctum')->get('categories', [CategoryController::class, 'index']);
Route::middleware('auth:sanctum')->get('categories/{category}', [CategoryController::class, 'show']);
Route::middleware('auth:sanctum')->put('category/{category}', [CategoryController::class, 'update']);
Route::middleware('auth:sanctum')->delete('category/{category}', [CategoryController::class, 'destroy']);


//posts
Route::middleware('auth:sanctum')->post('posts/create', [PostController::class, 'store']);
Route::middleware('auth:sanctum')->put('posts/{post:slug}', [PostController::class, 'update']);

//homepage part
Route::get('all/posts', [HomeController::class, 'index']);

Route::get('single/post/{post:slug}', [PostController::class, 'show']);
Route::get('posts/all', [PostController::class, 'index']);
Route::get('/dashboard-posts', [DashboardBlogController::class, 'index']);

Route::get('related-post/{post:slug}', [RelatedPostController::class, 'show']);
