<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartOrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LotterysController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/',[HelloController::class,'showHello']);
// Route::resource('pages', LotterysController::class);
// Route::resource('pages', LotterysController::class); 
// Route::resource('profile', ProfileController::class);
// Route::resource('history', HistoryController::class);
// Route::resource('cart', CartOrderController::class);
// Route::resource('login', LoginController::class);
// Route::resource('register', RegisterController::class);
// Route::resource('contact', ContactController::class);

Route::resource('posts', PostsController::class);

// Route::livewire('/test', 'counter')->name('counter');
// Route::get('/home', App\Http\Livewire\Home::class);
// Route::get('/contact', App\Http\Livewire\Contact::class);
// Route::livewire('/', 'home')->name('home');

Auth::routes();
// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// Route::get('/login_', [App\Http\Controllers\Auth\LoginController::class, 'loginPage'])->name('_login_u');
// Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home/search/all/', [App\Http\Controllers\HomeController::class, 'lottoAll'])->name('home.lottoAll');
Route::get('home/search/Fthree/', [App\Http\Controllers\HomeController::class, 'lottoFirst3'])->name('home.lottoFirst3');
Route::get('home/search/Lthree/', [App\Http\Controllers\HomeController::class, 'lottoLast3'])->name('home.lottoLast3');
Route::get('home/search/Ltwo', [App\Http\Controllers\HomeController::class, 'lottoLast2'])->name('home.lottoLast2');

Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::get('profile/{username}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// Route::get('users/{user}',  ['as' => 'pages.edit_profile', 'uses' => 'ProfileController@edit']);
// Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'ProfileController@update']);


Route::get('history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');


Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
// Route::get('getToCart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::get('view-checkout', [CartController::class, 'checkout'])->name('cart.viewCheckout');
Route::post('checkout', [CartController::class, 'cartCheckout'])->name('cart.checkout');
Route::post('checkout-cod', [CartController::class, 'cartCheckoutCod'])->name('cart.checkoutCod');

// Route::apiResource('product',[App\Http\Controllers\HomeController::class, 'lotteryApi']);


//*! Admin *//
Route::group(['middleware' => 'is.admin'], function () {

    Route::resource('dashboard', DashboardController::class);

    Route::get('image/{filename}', 'DashboardController@displayImage')->name('image.displayImage');
    
    Route::get('admin/dashboard/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('admin/dashboard/products', [App\Http\Controllers\DashboardController::class, 'products'])->name('products');
    Route::get('admin/dashboard/products/search/', [App\Http\Controllers\DashboardController::class, 'productSearch'])->name('products.search');
    Route::get('admin/dashboard/products/search2last/', [App\Http\Controllers\DashboardController::class, 'productSearchLast2'])->name('products.search2last');
    Route::get('admin/dashboard/products/report', [App\Http\Controllers\DashboardController::class, 'productReport'])->name('productReport');

    Route::get('admin/dashboard/members', [App\Http\Controllers\DashboardController::class, 'members'])->name('members');
    Route::get('admin/dashboard/members/view/{id}', [App\Http\Controllers\DashboardController::class, 'memberDetail'])->name('memberDetail');
    Route::get('admin/dashboard/members/search/', [App\Http\Controllers\DashboardController::class, 'memSearch'])->name('member.search');
    Route::post('member/update', [DashboardController::class, 'memberUpdate'])->name('member.update');

    Route::get('admin/dashboard/orders', [App\Http\Controllers\DashboardController::class, 'orders'])->name('orders');
    Route::get('admin/dashboard/orders/search/', [App\Http\Controllers\DashboardController::class, 'orderSearch'])->name('orders.search');
    Route::get('admin/dashboard/orders/view/{id}', [App\Http\Controllers\DashboardController::class, 'ordersDetail'])->name('ordersDetail');
    Route::post('orders/update', [DashboardController::class, 'ordersUpdate'])->name('order.update');
    
    Route::get('admin/dashboard/stock', [App\Http\Controllers\DashboardController::class, 'stock'])->name('stockProduct');
    Route::post('stock/upload-lottery', [DashboardController::class, 'uploadLottery'])->name('stock.upload');
});
//*! Admin *//