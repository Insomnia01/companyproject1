<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as adminhomecontroller;
use App\Http\Controllers\Admin\CategoryController as admincategorycontroller;
use App\Http\Controllers\Admin\ProductController as adminproductcontroller;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
return view('layouts/admin');
})->name('admin');

Route::get('/index',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/whyus',[HomeController::class,'whyus']);
Route::get('/category',[HomeController::class,'category']);
Route::get('/contact',[HomeController::class,'contact']);

//admin işlemleri
Route::get('/admin',[adminhomecontroller::class,'index'])->name('adminhome')->middleware('auth');
Route::get('/admin/login',[HomeController::class,'login'])->name('adminlogin');
Route::post('/admin/logincheck',[HomeController::class,'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout',[HomeController::class,'logout'])->name('admin_logout');

//admin category işlemleri
Route::middleware('auth')->prefix('admin')->group(function () {

Route::get('/category',[admincategorycontroller::class,'index'])->name('admin_category');
Route::get('/category/add',[admincategorycontroller::class,'add'])->name('admin_category_add');
Route::post('/category/create',[admincategorycontroller::class,'create'])->name('admin_category_create');
Route::get('/category/edit/{id}',[admincategorycontroller::class,'edit'])->name('admin_category_edit');
Route::post('/category/update/{id}',[admincategorycontroller::class,'update'])->name('admin_category_update');
Route::get('/category/delete/{id}',[admincategorycontroller::class,'delete'])->name('admin_category_delete');
Route::get('/category/show',[admincategorycontroller::class,'show'])->name('admin_category_show');
});

Route::get('/', function () {
return view('welcome');
});

//admin product işlemleri
Route::middleware('auth')->prefix('admin')->group(function () {

Route::get('/product', ['uses'=>'App\Http\Controllers\Admin\ProductController@index'])->name('admin_product');
Route::get('/product/add',[adminproductcontroller::class,'add'])->name('admin_product_add');
Route::post('/product/store',[adminproductcontroller::class,'store'])->name('admin_product_store');
Route::get('/product/{product}/edit',[adminproductcontroller::class,'edit'])->name('admin_product_edit');  
Route::post('/product/{product}/update',[adminproductcontroller::class,'update'])->name('admin_product_update');  
Route::get('/product/{product}/delete',[adminproductcontroller::class,'delete'])->name('admin_product_delete');  

});
