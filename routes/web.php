<?php

use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [ProfileController::class, 'password'])->name('password.update');

    Route::resource('users', UserController::class)->names('backend.users')->except(['show']);
    Route::resource('categories', CategoryController::class)->names('backend.categories')->except(['show']);
    Route::resource('properties', PropertyController::class)->names('backend.properties')->except(['show']);
    Route::resource('articles', ArticleController::class)->names('backend.articles')->except(['show']);
    Route::resource('cities', CityController::class)->names('backend.cities')->except(['show']);
    Route::resource('comments', CommentController::class)->names('backend.comments')->only(['index', 'destroy']);
    Route::resource('messages', MessageController::class)->names('backend.messages')->only(['index', 'destroy']);

    // Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    // Route::get('tracking', [TrackingController::class, 'index'])->name('tracking.index');

    // Route::group(['middleware' => ['role:admin']], function () {
    //     Route::get('users', [UserController::class, 'index'])->name('users.index');
    //     Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    //     Route::get('jenis', [JenisController::class, 'index'])->name('jenis.index');
    //     Route::get('locations', [LocationController::class, 'index'])->name('locations.index');
    //     Route::get('asets', [AsetController::class, 'index'])->name('asets.index');
    // });
});
