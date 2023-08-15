<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Comments;
use Illuminate\Support\Facades\Route;



Route::get('/',[PostController::class,'welcome']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/posts/{post_id}/comments', Comments::class);
    Route::get('/post/myposts',[PostController::class,'userPosts'])->name('user.posts');
    Route::resource('/post',PostController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
