<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/article/create', [ArticleController::class,'create'])->name('article.create');

Route::post('/article/store', [ArticleController::class,'store'])->name('article.store');

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

Route::get('/article/author/{user}', [PublicController::class, 'authorList'])->name('article.authorList');

Route::get('/user/profile', [ProfileController::class, 'profile'])->name('user.profile');

Route::get('/user/edit', [ProfileController::class, 'edit'])->name('user.edit');

Route::put('/user/update', [ProfileController::class, 'update'])->name('user.update');



