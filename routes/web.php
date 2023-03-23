<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\ReviewController as AdminReviewController;

//Admin Panel
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\admin\HomeController::class, 'adminDashboard'])->name('dashboard');
    Route::resource('category', \App\Http\Controllers\admin\CategoryController::class)->except(['show', 'edit', 'create']);
    Route::resource('city', \App\Http\Controllers\admin\CityController::class)->except(['show', 'edit', 'create']);
    Route::resource('organization', \App\Http\Controllers\admin\OrganizationController::class)->except(['show']);
    Route::get('logout', [\App\Http\Controllers\admin\AdminController::class, 'logout'])->name('logout');
    Route::get('business/review', [AdminReviewController::class, 'reviewBusiness'])->name('reviews.business');
    Route::get('review/{slug}', [AdminReviewController::class, 'reviews'])->name('reviews');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/autocomplete', [HomeController::class, 'autocomplete'])->name('autocomplete');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/categories', [CategoryController::class, 'allCategories'])->name('all.categories');
Route::get('/category/{slug}', [CategoryController::class, 'categoryBusiness'])->name('category.business');

Route::get('/import', [OrganizationController::class, 'import'])->name('import');
Route::get('/copy-past', [OrganizationController::class, 'copyPast'])->name('copy.past');

Route::get('/{city_slug}/{category_slug}', [OrganizationController::class, 'cityWiseOrganizations'])->name('city.wise.organizations');
Route::get('/{city_slug}/nls/{organization_slug}', [OrganizationController::class, 'cityWiseOrganization'])->name('city.wise.organization');

Route::get('/cities', [CityController::class, 'index'])->name('city.index');
Route::get('/{slug}', [CategoryController::class, 'index'])->name('category.index');

Route::post('/store-review', [ReviewController::class, 'store'])->name('review.store');

