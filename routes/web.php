<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
});
// ↑↓
// Route::get('/admin/news/create', [NewsController::class, 'add'])->middleware('auth')->name('admin.news.add');
// Route::post('/admin/news/create', [NewsController::class, 'create'])->middleware('auth')->name('admin.news.create');

//課題４
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('profile/create', 'add');
    Route::get('profile/edit', 'edit');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::post('profile/edit', 'update')->name('profile.update');
});

// 課題３
// Route::controller(AAA::class)->group(function(){
//     Route::get('XXX', 'bbb')
// });
// ↑↓書き換えてみよう
// use App\Http\Controllers\AAAContoller;
// Route::get('XXX', [AAAContoller:class, 'bbb']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
