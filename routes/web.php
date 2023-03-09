<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;

//Admin Panel
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\admin\HomeController::class, 'adminDashboard'])->name('dashboard');
    Route::resource('category', \App\Http\Controllers\admin\CategoryController::class)->except(['show','edit','create']);
    Route::resource('city', \App\Http\Controllers\admin\CityController::class)->except(['show','edit','create']);
    Route::resource('organization', \App\Http\Controllers\admin\OrganizationController::class)->except(['show']);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/category/{slug}', [CategoryController::class, 'categoryBusiness'])->name('category.business');

Route::get('/file-import', [OrganizationController::class, 'importView'])->name('import-view');
Route::get('/import', [OrganizationController::class, 'import'])->name('import');
Route::get('/copy-past', [OrganizationController::class, 'copyPast'])->name('copy.past');

Route::get('/{city_slug}/{category_slug}', [OrganizationController::class, 'cityWiseOrganizations'])->name('city.wise.organizations');
Route::get('/{city_slug}/nls/{organization_slug}', [OrganizationController::class, 'cityWiseOrganization'])->name('city.wise.organization');

Route::get('/cities', [CityController::class, 'index'])->name('city.index');
Route::get('/{slug}', [CityController::class, 'cityCategory'])->name('city.category');

Route::post('/store-review', [ReviewController::class, 'store'])->name('review.store');

