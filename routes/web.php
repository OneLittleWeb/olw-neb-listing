<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/counties', [OrganizationController::class, 'index'])->name('counties.index');
Route::get('/cities', [OrganizationController::class, 'allCity'])->name('city.index');

Route::get('/file-import', [OrganizationController::class, 'importView'])->name('import-view');
Route::get('/import', [OrganizationController::class, 'import'])->name('import');
