<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\OrderDetailsController;
use App\Http\Controllers\Api\V1\ProductImageController;
use App\Http\Controllers\Api\V1\InventoryController;
use App\Http\Controllers\Api\V1\CollectionController;
use App\Http\Controllers\Api\V1\ShipmentController;
use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\ProductCollectionController;
use App\Http\Controllers\Api\V1\ProductSeriesController;
use App\Http\Controllers\Api\V1\MaterialController;


Route::prefix('v1')->group(function () {
    Route::apiResource('/customers', CustomerController::class);
    Route::apiResource('/orders', OrderController::class);

    Route::apiResource('/products', ProductController::class);
    Route::get('/products/bySeries/{productSeriesId}', [ProductController::class, 'getByProductSeries']);

    Route::apiResource('/OD', OrderDetailsController::class);

    Route::apiResource('/productImages', ProductImageController::class);
    Route::post('/productImages/upload', [ProductImageController::class, 'upload']);

    Route::apiResource('/inventory', InventoryController::class);
    Route::apiResource('/collections', CollectionController::class);
    Route::apiResource('/PC', ProductCollectionController::class);
    Route::apiResource('/address', AddressController::class);
    Route::apiResource('/shipments', ShipmentController::class);
    Route::apiResource('/employees', EmployeeController::class);
    Route::apiResource('/productSeries', ProductSeriesController::class);
    Route::apiResource('/materials', MaterialController::class);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
