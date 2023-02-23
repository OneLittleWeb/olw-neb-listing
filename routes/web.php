<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/counties', [OrganizationController::class, 'index'])->name('counties.index');
Route::get('/cities', [OrganizationController::class, 'allCity'])->name('city.index');

Route::get('/file-import', [OrganizationController::class, 'importView'])->name('import-view');
Route::get('/import', [OrganizationController::class, 'import'])->name('import');
