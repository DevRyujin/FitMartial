<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TrainingEntryController;
use Illuminate\Support\Facades\Cache;

use App\Models\Post;

Route::view('/', 'LandingPage')->name('LandingPage');


Route::get('/login-test', function () {
    return view('auth.login');
});


Route::get('/tracker', [TrainingEntryController::class, 'index'])
    ->middleware('auth')
    ->name('tracker');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [PostController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/training-entries', [TrainingEntryController::class, 'fetch'])->name('training.fetch');
    Route::put('/training/{training}', [TrainingEntryController::class, 'update'])->name('training.update');
    Route::post('/training', [TrainingEntryController::class, 'store'])->name('training.store');
    Route::delete('/training/{training}', [TrainingEntryController::class, 'destroy'])->name('training.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth-test', function () {
    dd([
        'auth_function_exists' => function_exists('auth'),
        'auth_type' => get_class(auth()),
        'auth_dump' => auth(),
    ]);
});

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::post('/training-entries', [TrainingEntryController::class,'store'])->middleware('auth');

require __DIR__.'/auth.php';
