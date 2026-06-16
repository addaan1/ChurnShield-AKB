<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemographicsController;
use App\Http\Controllers\BehaviorController;
use App\Http\Controllers\ModelEvalController;
use App\Http\Controllers\PredictController;
use App\Http\Controllers\AboutController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/demographics', [DemographicsController::class, 'index'])->name('demographics');
    Route::get('/behavior', [BehaviorController::class, 'index'])->name('behavior');
    Route::get('/models', [ModelEvalController::class, 'index'])->name('models');
    Route::get('/predict', [PredictController::class, 'index'])->name('predict');
    Route::post('/predict', [PredictController::class, 'predict'])->name('predict.run');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
