<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\admin\ReviewController as AdminReviewController;
use App\Http\Controllers\admin\ContactUsController;

//Admin Panel
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\admin\HomeController::class, 'adminDashboard'])->name('dashboard');
    Route::resource('category', \App\Http\Controllers\admin\CategoryController::class)->except(['show', 'edit', 'create']);
    Route::resource('city', \App\Http\Controllers\admin\CityController::class)->except(['show', 'edit', 'create']);
    Route::resource('organization', \App\Http\Controllers\admin\OrganizationController::class)->except(['show']);
    Route::resource('settings', \App\Http\Controllers\admin\SettingController::class)->except(['show']);
    Route::get('logout', [\App\Http\Controllers\admin\AdminController::class, 'logout'])->name('logout');
    Route::get('business/review', [AdminReviewController::class, 'reviewBusiness'])->name('reviews.business');
    Route::get('review/{slug}', [AdminReviewController::class, 'reviews'])->name('reviews');
    Route::get('contacts', [ContactUsController::class, 'index'])->name('contact.index');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/autocomplete', [HomeController::class, 'autocomplete'])->name('autocomplete');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/checkout',[StripePaymentController::class,'index'])->name('stripe.form');
Route::post('/checkout',[StripePaymentController::class,'checkout'])->name('stripe.checkout');
Route::get('/success',[StripePaymentController::class,'success'])->name('stripe.success');


Route::get('/categories', [CategoryController::class, 'allCategories'])->name('all.categories');
Route::get('/category/{slug}', [CategoryController::class, 'categoryBusiness'])->name('category.business');

Route::get('/{city_slug}/{category_slug}', [OrganizationController::class, 'cityWiseOrganizations'])->name('city.wise.organizations');
Route::get('/{city_slug}/nls/{organization_slug}', [OrganizationController::class, 'cityWiseOrganization'])->name('city.wise.organization');

Route::get('/cities', [CityController::class, 'index'])->name('city.index');
Route::post('/store-review', [ReviewController::class, 'store'])->name('review.store');

Route::get('/sitemap', [SitemapController::class, 'sitemapStore'])->name('sitemap');

Route::get('/import', [OrganizationController::class, 'import'])->name('import');
Route::get('/copy-past', [OrganizationController::class, 'copyPast'])->name('copy.past');

Route::get('/about-us',[PageController::class, 'aboutUs'])->name('page.about');
Route::get('/privacy-policy',[PageController::class, 'privacy'])->name('page.privacy');
Route::get('/terms-conditions',[PageController::class, 'termsConditions'])->name('terms.conditions');
Route::get('/contact-us',[PageController::class, 'contactUs'])->name('page.contact');
Route::post('/contact-store',[PageController::class, 'contactStore'])->name('contact.store');
Route::get('/pricing',[PricingController::class, 'index'])->name('page.pricing');

Route::get('/claim-your-business',[OrganizationController::class, 'claimBusiness'])->name('claim.business');

Route::get('/{slug}', [CategoryController::class, 'index'])->name('category.index');


