<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CityController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/file-import', [OrganizationController::class, 'importView'])->name('import-view');
Route::get('/import', [OrganizationController::class, 'import'])->name('import');
Route::get('/{city_slug}/{category_slug}', [OrganizationController::class, 'cityWiseOrganizations'])->name('city.wise.organizations');
Route::get('/{city_slug}/nls/{organization_slug}', [OrganizationController::class, 'cityWiseOrganization'])->name('city.wise.organization');

Route::get('/cities', [CityController::class, 'index'])->name('city.index');
Route::get('/{slug}', [CityController::class, 'cityCategory'])->name('city.category');
