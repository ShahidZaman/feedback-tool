<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminloginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostsController::class, 'index']);


// Route::resource('/blog', PostsController::class);
Route::resource('/feedback', PostsController::class);

Auth::routes();

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/feedback-list', [AdminController::class, 'feedbacklist']);
Route::get('/admin/feedback-detail/{id}', [AdminController::class, 'feedbackdetail']);
Route::get('/admin/logout', [AdminloginController::class, 'logout'])->name('admin.logout');
Route::get('/admin/signin', [AdminloginController::class, 'login'])->name('admin.signin');
Route::post('/admin/auth', [AdminloginController::class, 'auth'])->name('admin.auth');

