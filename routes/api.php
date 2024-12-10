<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\MaterialController;
use \App\Http\Controllers\ProductMaterialController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/index-product', [ProductController::class, 'index']);
Route::post('/create-product', [ProductController::class, 'createProduct']);

Route::get('/index-material', [MaterialController::class, 'index']);
Route::post('/create-material', [MaterialController::class, 'createMaterial']);

Route::get('/index-product-material', [ProductMaterialController::class, 'index']);
Route::post('/create-product-material', [ProductMaterialController::class, 'createProductMaterial']);

Route::get('/index-warehouse', [WarehouseController::class, 'index']);
Route::post('/create-warehouse', [WarehouseController::class, 'createWarehouse']);

