<?php

use Illuminate\Support\Facades\Route;
use Imagina\Icore\Http\Controllers\Api\ConfigsApiController;
use Imagina\Icore\Http\Controllers\Api\RatesApiController;

Route::prefix('/icore/v1')->group(function () {

  Route::prefix('/configs')->group(function () {
    Route::get('/', [ConfigsApiController::class, 'index']);
    Route::get('/modules-info', [ConfigsApiController::class, 'modulesInfo']);
  });

  Route::prefix('/rates')->group(function () {
    Route::get('/conversions', [RatesApiController::class, 'index']);
  });
});
