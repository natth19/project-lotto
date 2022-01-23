<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('products', ProductController::class);
Route::get('/products/search/{lottery_number}', [ProductController::class, 'search']);

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products', [ProductController::class, 'show']);
Route::get('/lottery', function () {
    return DB::table('lottery')->get();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
