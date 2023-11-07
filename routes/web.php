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
Route::get('/toko', [SellersController::class, 'index'])->name('sellers.index')->middleware('web');

Route::get('/toko/filter', [SellersController::class, 'filter']);
Route::get('/toko/filters', [SellersController::class, 'filterCard']);

Route::post('/toko/search', [SellersController::class, 'SearchUMKM']);
Route::get('/toko/{slug}', [SellersController::class, 'show'])->where('slug', '^[a-zA-Z0-9-_]+$');


Route::post('/toko/{sellerSlug}/berita/{newSlug}', [BlogsController::class, 'show']);
Route::get('/toko/{sellerSlug}/products/{productSlug}', [SellerProductsController::class, 'show']);

Route::get('/berita', [BlogsController::class, 'index'])->name('pages.blogs.index');
Route::get('/berita/filter', [BlogsController::class, 'Oldest_News']);


// Route::get('/billing', function (Request $request) {
//     return view("pages.billing.index");
// });
Route::get('/cart', function () {
    return view("pages.cart.index");
})->name("cart");

Route::any('{any}', function () {
    return view("pages.404.index");
});



// Route::get('/sellers/toko-cendrawasih/contact', function () {
//     return view('pages.sellers.seller.contact.index');
// });