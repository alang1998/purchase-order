<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Dashboard\DashboardChartController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HistoryReportsController;
use App\Http\Controllers\PurchaseOrderReportController;
use App\Http\Controllers\PurchaseOrderVerificationController;
use App\Models\HistoryReports;

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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function(){
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('getWeeklyPurchaseOrder', [DashboardChartController::class, 'getWeeklyPurchaseOrder'])->name('dashboard.getWeeklyPurchaseOrder');
    Route::get('getBestProduct', [DashboardChartController::class, 'getBestProduct'])->name('dashboard.getBestProduct');
    Route::get('getWorstProduct', [DashboardChartController::class, 'getWorstProduct'])->name('dashboard.getWorstProduct');
    Route::get('getWeeklyNominalPurchaseOrder', [DashboardChartController::class, 'getWeeklyNominalPurchaseOrder'])->name('dashboard.getWeeklyNominalPurchaseOrder');
    Route::get('weightPurchaseOrder', [DashboardChartController::class, 'weightPurchaseOrder'])->name('dashboard.weightPurchaseOrder');
    
    Route::group(['prefix' => 'profil'], function(){        
        Route::get('/{user:name}', [DashboardController::class, 'myProfile'])->name('dashboard.myProfile');
        Route::get('/edit/{user}', [DashboardController::class, 'myProfileEdit'])->name('dashboard.myProfile.edit');
        Route::post('changePassword/{user}', [DashboardController::class, 'changePassword'])->name('dashboard.myProfile.changePassword');
    });


    Route::group(['prefix' => 'wilayah', 'middleware' => ['role:super-user,supervisor,wakil-supervisor']], function(){
        Route::get('/', [RegionController::class, 'index'])->name('region');
        Route::get('create', [RegionController::class, 'create'])->name('region.create');
        Route::post('create', [RegionController::class, 'store']);
        Route::get('edit/{region}', [RegionController::class, 'edit'])->name('region.edit');
        Route::put('edit/{region}', [RegionController::class, 'update']);
        Route::delete('delete', [RegionController::class, 'destroy'])->name('region.delete');
    
    });
    Route::get('getRegions', [RegionController::class, 'getRegion'])->name('api.getRegion');
    
    Route::group(['prefix' => 'wewenang', 'middleware' => ['role:super-user']], function(){
        Route::get('/', [RoleController::class, 'index'])->name('role');
        Route::get('create', [RoleController::class, 'create'])->name('role.create');
        Route::post('create', [RoleController::class, 'store']);
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('edit/{role}', [RoleController::class, 'update']);
        Route::delete('delete', [RoleController::class, 'destroy'])->name('role.delete');
    });
    
    Route::group(['prefix' => 'unit', 'middleware' => ['role:super-user,supervisor,wakil-supervisor']], function(){
        Route::get('/', [UnitController::class, 'index'])->name('unit');
        Route::get('create', [UnitController::class, 'create'])->name('unit.create');
        Route::post('create', [UnitController::class, 'store']);
        Route::get('edit/{unit}', [UnitController::class, 'edit'])->name('unit.edit');
        Route::put('edit/{unit}', [UnitController::class, 'update']);
        Route::delete('delete', [UnitController::class, 'destroy'])->name('unit.delete');
        
    });
    
    Route::group(['prefix' => 'cabang', 'middleware' => ['role:super-user,supervisor,wakil-supervisor']], function(){
        Route::get('/', [StoreController::class, 'index'])->name('store');
        Route::get('create', [StoreController::class, 'create'])->name('store.create');
        Route::post('create', [StoreController::class, 'store']);
        Route::get('edit/{store}', [StoreController::class, 'edit'])->name('store.edit');
        Route::put('edit/{store}', [StoreController::class, 'update']);
        Route::delete('delete', [StoreController::class, 'destroy'])->name('store.delete');

    });
    
    Route::group(['prefix' => 'supplier', 'middleware' => ['role:super-user,supervisor,wakil-supervisor']], function(){
        Route::get('/', [SupplierController::class, 'index'])->name('supplier');
        Route::get('create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('create', [SupplierController::class, 'store']);
        Route::get('edit/{supplier}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::put('edit/{supplier}', [SupplierController::class, 'update']);
        Route::delete('delete', [SupplierController::class, 'destroy'])->name('supplier.delete');
        Route::get('show/{supplier}', [SupplierController::class, 'show'])->name('supplier.show');

        Route::post('importItemsPrice', [SupplierController::class, 'importItemsPrice'])->name('supplier.importItemsPrice');
    });
    
    Route::group(['prefix' => 'merk', 'middleware' => ['role:super-user,supervisor,wakil-supervisor']], function(){
        Route::get('/', [BrandController::class, 'index'])->name('brand');
        Route::get('create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('create', [BrandController::class, 'store']);
        Route::get('edit/{brand}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('edit/{brand}', [BrandController::class, 'update']);
        Route::delete('delete', [BrandController::class, 'destroy'])->name('brand.delete');
    
    });
    
    Route::group(['prefix' => 'company', 'middleware' => ['role:super-user']], function(){
        Route::get('/', [CompanyController::class, 'index'])->name('company');
        Route::get('create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('create', [CompanyController::class, 'store']);
        Route::get('edit/{company}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::put('edit/{company}', [CompanyController::class, 'update']);
        Route::delete('delete', [CompanyController::class, 'destroy'])->name('company.delete');
    });

    Route::group(['prefix' => 'pengguna', 'middleware' => ['role:super-user']], function(){
        Route::get('/', [UserController::class, 'index'])->name('pengguna');
        Route::get('create', [UserController::class, 'create'])->name('pengguna.create');
        Route::post('create', [UserController::class, 'store']);
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('pengguna.edit');
        Route::put('edit/{user}', [UserController::class, 'update']);
        Route::delete('delete', [UserController::class, 'destroy'])->name('pengguna.delete');

        Route::get('resetPassword/{user}', [UserController::class, 'resetPassword'])->name('pengguna.resetPassword');
        Route::get('active/{user}', [UserController::class, 'active'])->name('pengguna.active');
    });
    
    Route::group(['prefix' => 'produk', 'middleware' => ['role:super-user,supervisor,wakil-supervisor']], function(){
        Route::get('/', [ItemController::class, 'index'])->name('item');
        Route::get('create', [ItemController::class, 'create'])->name('item.create');
        Route::post('create', [ItemController::class, 'store']);
        Route::get('edit/{item}', [ItemController::class, 'edit'])->name('item.edit');
        Route::put('edit/{item}', [ItemController::class, 'update']);
        Route::get('show/{item}', [ItemController::class, 'show'])->name('item.show');
        Route::delete('delete', [ItemController::class, 'destroy'])->name('item.delete');

        Route::post('import', [ItemController::class, 'importItems'])->name('item.import');
    });

    Route::group(['prefix' => 'purchase_order'], function(){

        Route::group(['middleware' => ['role:super-user,wakil-supervisor,staff-purchasing']], function(){

            Route::get('/', [PurchaseOrderController::class, 'index'])->name('purchase_order');
            Route::get('create', [PurchaseOrderController::class, 'create'])->name('purchase_order.create');
            Route::post('create', [PurchaseOrderController::class, 'store']);
            Route::get('edit/{purchase_order}', [PurchaseOrderController::class, 'edit'])->name('purchase_order.edit');
            Route::put('edit/{purchase_order}', [PurchaseOrderController::class, 'update']);
            Route::get('show/{purchase_order}', [PurchaseOrderController::class, 'show'])->name('purchase_order.show');
            Route::delete('delete', [PurchaseOrderController::class, 'destroy'])->name('purchase_order.delete');

        });

        Route::get('print_order/{purchase_order}', [PurchaseOrderController::class, 'printOrder'])->name('purchase_order.printOrder');

        Route::get('getOrderNumber', [PurchaseOrderController::class, 'orderNumber'])->name('purchase_order.getOrderNumber');
        Route::get('getDetailSupplier', [PurchaseOrderController::class, 'detailSupplier'])->name('purchase_order.getDetailSupplier');
        Route::get('getItemsOrder', [PurchaseOrderController::class, 'getItemsOrder'])->name('purchase_order.getItemsOrder');

        Route::group(['prefix' => 'verifikasi', 'middleware' => ['role:super-user,supervisor,wakil-supervisor']], function(){

            Route::get('/', [PurchaseOrderVerificationController::class, 'index'])->name('purchase_order.verification');
            Route::get('show/{purchase_order}', [PurchaseOrderVerificationController::class, 'show'])->name('purchase_order.verification.show');
            Route::post('postVerification/{purchase_order}', [PurchaseOrderVerificationController::class, 'verification'])->name('purchase_order.verification.sendVerification');

        });

        Route::group(['prefix' => 'laporan'], function(){
            
            Route::get('/', [PurchaseOrderReportController::class, 'index'])->name('purchase_order.report');
            Route::get('show/{purchase_order}', [PurchaseOrderReportController::class, 'show'])->name('purchase_order.report.show');
            Route::get('getReports', [PurchaseOrderReportController::class, 'getReports'])->name('purchase_order.report.getReports');

            Route::get('exportToExcel', [PurchaseOrderReportController::class, 'exportToExcel'])->name('purchase_order.report.exportToExcel');

            Route::group(['prefix' => 'history', 'middleware' => ['role:super-user,supervisor,wakil-supervisor,staff-purchasing']], function(){
                
                Route::post('receiptOfGoods/{purchase_order}', [HistoryReportsController::class, 'receiptGoods'])->name('purchase_order.report.receiptGoods');

            });

        });

    });
    
    Route::get('getItems', [ItemController::class, 'getItems'])->name('api.getItems');
    Route::get('getUnits', [UnitController::class, 'getUnit'])->name('api.getUnit');
    Route::get('getStores', [StoreController::class, 'getStores'])->name('api.getStores');
    Route::get('getBrands', [BrandController::class, 'getBrand'])->name('api.getBrand');
    Route::get('getSuppliers', [SupplierController::class, 'getSuppliers'])->name('api.getSuppliers');

});


// Route::get('deleteItems', [ItemController::class, 'deleteItems']);