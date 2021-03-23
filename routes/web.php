<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
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

Route::get('/', DashboardController::class)->name('dashboard');

Route::group(['prefix' => 'wilayah'], function(){
    Route::get('/', [RegionController::class, 'index'])->name('region');
    Route::get('create', [RegionController::class, 'create'])->name('region.create');
    Route::post('create', [RegionController::class, 'store']);
    Route::get('edit/{region}', [RegionController::class, 'edit'])->name('region.edit');
    Route::put('edit/{region}', [RegionController::class, 'update']);
    Route::delete('delete', [RegionController::class, 'destroy'])->name('region.delete');

    Route::get('getRegions', [RegionController::class, 'getRegion'])->name('api.getRegion');
});

Route::group(['prefix' => 'wewenang'], function(){
    Route::get('/', [RoleController::class, 'index'])->name('role');
    Route::get('create', [RoleController::class, 'create'])->name('role.create');
    Route::post('create', [RoleController::class, 'store']);
    Route::get('edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('edit/{role}', [RoleController::class, 'update']);
    Route::delete('delete', [RoleController::class, 'destroy'])->name('role.delete');
});

Route::group(['prefix' => 'unit'], function(){
    Route::get('/', [UnitController::class, 'index'])->name('unit');
    Route::get('create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('create', [UnitController::class, 'store']);
    Route::get('edit/{unit}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::put('edit/{unit}', [UnitController::class, 'update']);
    Route::delete('delete', [UnitController::class, 'destroy'])->name('unit.delete');

    Route::get('getUnits', [UnitController::class, 'getUnit'])->name('api.getUnit');
});

Route::group(['prefix' => 'cabang'], function(){
    Route::get('/', [StoreController::class, 'index'])->name('store');
    Route::get('create', [StoreController::class, 'create'])->name('store.create');
    Route::post('create', [StoreController::class, 'store']);
    Route::get('edit/{store}', [StoreController::class, 'edit'])->name('store.edit');
    Route::put('edit/{store}', [StoreController::class, 'update']);
    Route::delete('delete', [StoreController::class, 'destroy'])->name('store.delete');
});

Route::group(['prefix' => 'supplier'], function(){
    Route::get('/', [SupplierController::class, 'index'])->name('supplier');
    Route::get('create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('create', [SupplierController::class, 'store']);
    Route::get('edit/{supplier}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('edit/{supplier}', [SupplierController::class, 'update']);
    Route::delete('delete', [SupplierController::class, 'destroy'])->name('supplier.delete');
});

Route::group(['prefix' => 'merk'], function(){
    Route::get('/', [BrandController::class, 'index'])->name('brand');
    Route::get('create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('create', [BrandController::class, 'store']);
    Route::get('edit/{brand}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('edit/{brand}', [BrandController::class, 'update']);
    Route::delete('delete', [BrandController::class, 'destroy'])->name('brand.delete');

    Route::get('getBrands', [BrandController::class, 'getBrand'])->name('api.getBrand');
});

Route::group(['prefix' => 'company'], function(){
    Route::get('/', [CompanyController::class, 'index'])->name('company');
    Route::get('create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('create', [CompanyController::class, 'store']);
    Route::get('edit/{company}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('edit/{company}', [CompanyController::class, 'update']);
    Route::delete('delete', [CompanyController::class, 'destroy'])->name('company.delete');
});

Route::group(['prefix' => 'pengguna'], function(){
    Route::get('/', [UserController::class, 'index'])->name('pengguna');
    Route::get('create', [UserController::class, 'create'])->name('pengguna.create');
    Route::post('create', [UserController::class, 'store']);
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('pengguna.edit');
    Route::put('edit/{user}', [UserController::class, 'update']);
    Route::delete('delete', [UserController::class, 'destroy'])->name('pengguna.delete');
});

Route::group(['prefix' => 'produk'], function(){
    Route::get('/', [ItemController::class, 'index'])->name('item');
    Route::get('create', [ItemController::class, 'create'])->name('item.create');
    Route::post('create', [ItemController::class, 'store']);
    Route::get('edit/{item}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('edit/{item}', [ItemController::class, 'update']);
    Route::delete('delete', [ItemController::class, 'destroy'])->name('item.delete');
});