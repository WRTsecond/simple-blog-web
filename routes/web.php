<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->akunPosts()->latest()->get();
    }
    // Alternatively, you can use the following line if you want to get all posts by the authenticated user:
    // $posts = Post::where('user_id', auth()->id())->get();
    return view('welcome', ['posts' => $posts]);
});

Route::post('register', [userController::class, 'register']);

Route::get('logout', [userController::class, 'logout']);

Route::get('login', [userController::class, 'login']);

// route related posts
Route::post('create-post', [postController::class, 'createPost']);

Route::get('edit-post{post}', [postController::class, 'editPost']);

Route::put('edit-post{post}', [postController::class, 'updatePost']);

Route::delete('delete-post{post}', [postController::class, 'deletePost']);
