<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\TagController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\PostController;

use App\Http\Controllers\Site\CommentController;
use App\Http\Controllers\Site\BlogController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('logout', function () {
    auth()->logout();
});

Auth::routes([]);

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('auth/posts', PostController::class);
    Route::get('auth/categories', [CategoryController::class, 'openCategoriesPage'])->name('auth.categories');
    Route::get('auth/tags', [TagController::class, 'openTagsPage'])->name('auth.tags');
    Route::get('auth/profile', [ProfileController::class, 'openProfilePage'])->name('auth.profile.index');
    Route::post('auth/profile', [ProfileController::class, 'storeProfile'])->name('auth.profile.store');

});

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('single-blog/{id}', [BlogController::class, 'openSingleBlog'])->name('single-blog');

Route::post('post/comment/{postId}', [CommentController::class, 'postComment'])->name('post.comment')->middleware('auth');
Route::post('comment/reply/{commentId}', [CommentController::class, 'postCommentReply'])->name('comment.reply');
Route::delete('comment/reply/delete', [CommentController::class, 'deleteCommentReply'])->name('comment.reply.delete');