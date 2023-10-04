<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BuyNowController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SellerProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
// Route::get('/slider', [CarouselrController::class, 'index']);


Route::get('/buy-now', [BuyNowController::class, 'index']);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/sellers/filter', [SellersController::class, 'filter']);
Route::get('/sellers', [SellersController::class, 'index']);
Route::get('/sellers/{slug}', [SellersController::class, 'show']);
Route::post('/sellers/search', [SellersController::class, 'SearchUMKM']);


Route::get('/sellers/{sellerSlug}/products/{productSlug}', [SellerProductsController::class, 'show']);

Route::get('/blogs', [BlogsController::class, 'index']);
Route::get('/blogs/filter', [BlogsController::class, 'Oldest_News']);
Route::get('/sellers/{sellerSlug}/blogs/{newSlug}', [BlogsController::class, 'show']);

Route::get('/billing', function (Request $request) {
    return view("pages.billing.index");
});
Route::get('/cart', function () {
    return view("pages.cart.index");
})->name("cart");

Route::any('{any}', function () {
    return view("pages.404.index");
});



// Route::get('/sellers/toko-cendrawasih/contact', function () {
//     return view('pages.sellers.seller.contact.index');
// });