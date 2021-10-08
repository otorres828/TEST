<?php

use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Post\PostController;
use App\Models\Comment;
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
    return redirect()->route('post.index');
});

Route::get('post',[PostController::class,'index'])->name('post.index');
Route::get('post/{slug}',  [PostController::class,'show'])->name('post.show_post');
Route::get('post/category/{slug}',  [PostController::class,'category'])->name('post.category_post');
Route::get('post/autor/{id}',  [PostController::class,'user'])->name('post.user_post');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('post.index');
})->name('dashboard');
