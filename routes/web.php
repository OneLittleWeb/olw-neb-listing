<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CityController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/counties', [OrganizationController::class, 'index'])->name('counties.index');
Route::get('/file-import', [OrganizationController::class, 'importView'])->name('import-view');
Route::get('/import', [OrganizationController::class, 'import'])->name('import');

Route::get('/cities', [CityController::class, 'index'])->name('city.index');
