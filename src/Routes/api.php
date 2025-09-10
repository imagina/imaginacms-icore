<?php

use Illuminate\Support\Facades\Route;
use Imagina\Icore\Http\Controllers\Api\ConfigsApiController;

Route::prefix('/icore/v1')->group(function () {
  Route::prefix('/configs')->group(function () {
    Route::get('/', [ConfigsApiController::class, 'index']);
    Route::get('/modules-info', [ConfigsApiController::class, 'modulesInfo']);
  });
});
