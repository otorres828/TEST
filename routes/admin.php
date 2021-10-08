<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Post\CommentController;

Route::resource('post', PostController::class)->except('show')->names('admin.post');
Route::resource('category', CategoryController::class)->except('show')->names('admin.category');
Route::resource('user', UserController::class)->except('show')->names('admin.user');

Route::resource('post/comment', CommentController::class)->only('store','update','destroy')->names('post.comment');


