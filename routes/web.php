<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/category',[CategoryController::class,'get'])->name('getCate');
Route::get('/create-category',[CategoryController::class,'getCategory'])->name('getCategory');
Route::post('/create-category',[CategoryController::class,'postCategory'])->name('postCategory');
Route::get('/update-category/{id}',[CategoryController::class,'getUpdateCategory'])->name('getUpdateCategory');
Route::post('/update-category/{id}',[CategoryController::class,'postUpdateCategory'])->name('postUpdateCategory');
Route::get('/delete-category/{id}',[CategoryController::class,'deleteCategory'])->name('getDeleteCategory');


Route::get('/product',[ProductController::class,'get'])->name('getPro');
Route::get('/create-product',[ProductController::class,'getProduct'])->name('getProduct');
Route::post('/create-product',[ProductController::class,'postProduct'])->name('postProduct');
Route::get('/update-product/{id}',[ProductController::class, 'getUpdateProduct'])->name('getUpdateProduct');
Route::post('/update-product/{id}',[ProductController::class,'postUpdateProduct'])->name('postUpdateProduct');
Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct'])->name('getDeleteProduct');
Route::get('/get-detail/{id}',[ProductController::class,'getDetail'])->name('getDetail');
