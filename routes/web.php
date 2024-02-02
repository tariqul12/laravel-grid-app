<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GridAppController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[GridAppController::class,"index"])->name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    // Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');

    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::post('/category/delete',[CategoryController::class,'delete'])->name('category.delete');
    
    Route::get('/sub-category/create',[SubCategoryController::class,'create'])->name('sub-category.create');
    Route::get('/sub-category/index',[SubCategoryController::class,'index'])->name('sub-category.index');
    Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub-category.edit');


    Route::post('/sub-category/store',[SubCategoryController::class,'store'])->name('sub-category.store');
    Route::post('/sub-category/update',[SubCategoryController::class,'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('sub-category.delete');


    Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::get('/brand/index',[BrandController::class,'index'])->name('brand.index');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');

    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::post('/brand/update',[BrandController::class,'update'])->name('brand.update');
    Route::post('/brand/delete',[BrandController::class,'delete'])->name('brand.delete');



    



    
});
