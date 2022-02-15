<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Client;

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
Route::prefix('admin')->group(function () {
    Route::get('/', DashboardController::class)->name('admin.dashboard');
    Route::resource('products', ProductController::class);
});

Route::get('/test', function () {
    dd(Client::factory()->count(100)->make());
});
