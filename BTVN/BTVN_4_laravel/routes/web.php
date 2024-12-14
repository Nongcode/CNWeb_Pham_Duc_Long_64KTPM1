<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route hiển thị danh sách bài viết
Route::get('/', [PostController::class, 'index'])->name('home');

// Route hiển thị form tạo bài viết mới
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Route lưu bài viết mới
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Route hiển thị form sửa bài viết
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route cập nhật bài viết đã chỉnh sửa
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

// Route xóa bài viết
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

