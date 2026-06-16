<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Author\PostController as AuthorPostController;

use App\Http\Controllers\Reader\PostController as ReaderPostController;
use App\Http\Controllers\Reader\LikeController;
use App\Http\Controllers\Reader\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ======================
    // Reader Routes
    // ======================

    Route::prefix('reader')->name('reader.')->group(function () {

        Route::get('/posts', [ReaderPostController::class, 'index'])
            ->name('posts.index');

        Route::get('/posts/{id}', [ReaderPostController::class, 'show'])
            ->name('posts.show');

        Route::post('/posts/{id}/like', [LikeController::class, 'toggle'])
            ->name('posts.like');

        Route::post('/posts/{id}/comment', [CommentController::class, 'store'])
            ->name('comments.store');

        Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
            ->name('comments.destroy');
    });

    // ======================
    // Admin Routes
    // ======================

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('categories', CategoryController::class);

        Route::resource('tags', TagController::class);

        Route::resource('users', UserController::class);
    });

    // ======================
    // Author Routes
    // ======================

    Route::prefix('author')->name('author.')->group(function () {

        Route::get('/posts', [AuthorPostController::class, 'index'])
            ->name('posts.index');

        Route::get('/posts/create', [AuthorPostController::class, 'create'])
            ->name('posts.create');

        Route::post('/posts', [AuthorPostController::class, 'store'])
            ->name('posts.store');

        Route::get('/posts/{id}/edit', [AuthorPostController::class, 'edit'])
            ->name('posts.edit');

        Route::put('/posts/{id}', [AuthorPostController::class, 'update'])
            ->name('posts.update');

        Route::delete('/posts/{id}', [AuthorPostController::class, 'destroy'])
            ->name('posts.destroy');
    });

});

require __DIR__.'/auth.php';