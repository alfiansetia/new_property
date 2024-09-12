<?php

use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('page/{category:slug}', [FrontendController::class, 'page'])->name('frontend.page');
Route::get('property/{property:slug}', [FrontendController::class, 'property'])->name('frontend.property');
Route::get('article/{article:slug}', [FrontendController::class, 'article_detail'])->name('frontend.article_detail');
Route::get('article', [FrontendController::class, 'article'])->name('frontend.article');
Route::get('agent', [FrontendController::class, 'agent'])->name('frontend.agent');
Route::get('testimonial', [FrontendController::class, 'testimonial'])->name('frontend.testimonial');

Route::post('message/{property}', [FrontendController::class, 'message'])->name('frontend.message');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::post('article/{article}', [FrontendController::class, 'comment'])->name('frontend.comment');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('backend.profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('backend.profile.update');
    Route::put('/profile', [ProfileController::class, 'password'])->name('backend.password.update');

    Route::resource('properties', PropertyController::class)->names('backend.properties')->except(['show']);

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', UserController::class)->names('backend.users')->except(['show']);
        Route::resource('categories', CategoryController::class)->names('backend.categories')->except(['show']);
        Route::resource('articles', ArticleController::class)->names('backend.articles')->except(['show']);
        Route::resource('cities', CityController::class)->names('backend.cities')->except(['show']);
        Route::resource('comments', CommentController::class)->names('backend.comments')->only(['index', 'destroy']);
        Route::resource('messages', MessageController::class)->names('backend.messages')->only(['index', 'destroy']);
    });
});
