<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeController;

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

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::group(['prefix'  =>   'categories'], function() {

    Route::get('/', [CategoryController::class,'index'])->name('backend.categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('backend.categories.create');
    Route::post('/store', [CategoryController::class,'store'])->name('backend.categories.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('backend.categories.edit');
    Route::post('/update', [CategoryController::class, 'update'])->name('backend.categories.update');
    Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('backend.categories.delete');

});

Route::group(['prefix'  =>   'attributes'], function() {

    Route::get('/', [AttributeController::class,'index'])->name('backend.attributes.index');
    Route::get('/create', [AttributeController::class, 'create'])->name('backend.attributes.create');
    Route::post('/store', [AttributeController::class, 'store'])->name('backend.attributes.store');
    Route::get('/{id}/edit', [AttributeController::class, 'edit'])->name('backend.attributes.edit');
    Route::post('/update', [AttributeController::class, 'update'])->name('backend.attributes.update');
    Route::get('/{id}/delete', [AttributeController::class, 'delete'])->name('backend.attributes.delete');

});

require __DIR__.'/auth.php';
