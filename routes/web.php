<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubadminController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\frontend\TrackingController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\ProductReviewController;

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
// "চিন্তাগুলোর ব্যাপারে সচেতন হোন, আপনার চিন্তা মুখের কথায় পরিণত হয়,
// মুখের কথার ব্যাপারে সচেতন হোন, আপনার কথা কাজে পরিণত হয়,
// কাজগুলোর ব্যাপারে সচেতন হোন, আপনার কাজ স্বভাবে পরিণত হয়,
// স্বভাবের ব্যাপারে সচেতন হোন, আপনার স্বভাব চরিত্রে পরিণত হয়,
// চরিত্রের ব্যাপারে সচেতন হোন, কেননা তা আপনার ভবিষ্যত নির্ধারণ করে দেবে।"



// Email: ismailbdcse@gmail.com
// Password : cse@ismail59


Route::get('/', [IndexController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ======================== Admin Routes =======================
Route::group(['prefix'=>'admin','middleware'=>['admin','auth','permission']], function(){
 Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

 //  profile
 Route::get('profile',[AdminController::class,'profile'])->name('profile');
 Route::post('update/info',[AdminController::class,'updateInfo'])->name('update-data');
 Route::get('update/image',[AdminController::class,'updateImage'])->name('admin-image');
 Route::post('image/store',[AdminController::class,'imageStore'])->name('store-image');
 Route::get('change-password',[AdminController::class,'changePass'])->name('change-password');
 Route::post('change-password-store',[AdminController::class,'changePassStore'])->name('change-password-store');
    //  all users
    Route::get('all-users',[AdminController::class,'allUsers'])->name('all-users');
    // banned user
    Route::get('user-banned/{user_id}',[AdminController::class,'banned']);
    Route::get('user-unbanned/{user_id}',[AdminController::class,'unBanned']);

//  brand routes
 Route::get('all-brands',[BrandController::class,'index'])->name('brands');
 Route::post('brand/store',[BrandController::class,'brandStore'])->name('brand-store');
 Route::get('/brand-edit/{brand_id}',[BrandController::class,'edit']);
 Route::post('brand/update',[BrandController::class,'brandUpdate'])->name('update-brand');
 Route::get('brand-delete/{brand_id}',[BrandController::class,'delete']);

//  Category routes
Route::get('category', [CategoryController::class,'index'])->name('category');
Route::post('category/store', [CategoryController::class,'categoryStore'])->name('category-store');
Route::get('/category-edit/{cat_id}',[CategoryController::class,'edit']);
Route::post('category/update',[CategoryController::class,'categoryUpdate'])->name('update-category');
Route::get('category-delete/{cat_id}',[CategoryController::class,'delete']);

// Subcategory
Route::get('sub-category', [CategoryController::class,'subIndex'])->name('sub-category');
Route::post('sub-category/store', [CategoryController::class,'subCategoryStore'])->name('sub-category-store');
Route::get('sub-category-edit/{subcat_id}',[CategoryController::class,'subEdit']);
Route::post('sub-category/update',[CategoryController::class,'subCategoryUpdate'])->name('update-sub-category');
Route::get('sub-category-delete/{subcat_id}',[CategoryController::class,'subDelete']);
// sub-sub-category
Route::get('sub-sub-category', [CategoryController::class,'subSubIndex'])->name('sub-sub-category');
Route::get('subcategory/ajax/{cat_id}',[CategoryController::class,'getSubCat']);
Route::post('sub-sub-category/store', [CategoryController::class,'subSubCategoryStore'])->name('sub-subcategory-store');
Route::get('sub-sub-category-edit/{subsubcat_id}',[CategoryController::class,'subSubEdit']);
Route::post('sub-subcategory/update',[CategoryController::class,'subSubCatUpdate'])->name('update-sub-subcategory');
Route::get('sub-sub-category-delete/{subsubcat_id}',[CategoryController::class,'subSubDelete']);

// ==================== Product ================
Route::get('add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::post('product/store', [ProductController::class, 'store'])->name('store-product');
Route::get('manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
Route::get('sub-subcategory/ajax/{subcat_id}', [ProductController::class, 'getSubSubCat']);
Route::get('product-edit/{product_id}', [ProductController::class, 'edit']);
Route::post('product-update', [ProductController::class, 'productUpdate'])->name('update-product');
Route::get('product-delete/{product_id}', [ProductController::class, 'delete']);
Route::post('product/multi-image/update',[ProductController::class, 'multiImageUpdate'])->name('update-product-image');
Route::post('product/thumbnail/update',[ProductController::class, 'thumbnailUpdate'])->name('update-product-thumbnail');
Route::get('product/multiImg/delete/{id}',[ProductController::class,'multiImgDelete']);
Route::get('product-inactive/{id}',[ProductController::class,'inactive']);
Route::get('product-active/{id}',[ProductController::class,'active']);
// sliders
Route::get('sliders',[SliderController::class,'index'])->name('sliders');
Route::post('slider/store', [SliderController::class,'sliderStore'])->name('slider-store');
Route::get('slider-edit/{id}', [SliderController::class,'edit']);
Route::post('slider/update',[SliderController::class,'sliderUpdate'])->name('update-slider');
Route::get('slider/delete/{id}',[SliderController::class,'destroy']);
Route::get('slider-inactive/{id}',[SliderController::class,'inactive']);
Route::get('slider-active/{id}',[SliderController::class,'active']);
// Coupon
Route::get('coupon',[CouponController::class,'create'])->name('coupon');
Route::post('coupon/store', [CouponController::class,'Store'])->name('coupon-store');
Route::get('coupon-edit/{id}', [CouponController::class,'edit']);
Route::post('coupon/update',[CouponController::class,'update'])->name('coupon-update');
Route::get('coupon-delete/{id}',[CouponController::class,'destroy']);
// shipping area division
Route::get('division',[ShippingAreaController::class,'createDivision'])->name('division');
Route::post('division/store',[ShippingAreaController::class,'storeDivision'])->name('division-store');
Route::get('division-edit/{id}', [ShippingAreaController::class,'edit']);
Route::post('division/update',[ShippingAreaController::class,'update'])->name('division-update');
Route::get('division-delete/{id}',[ShippingAreaController::class,'destroy']);
// shipping area district
Route::get('district',[ShippingAreaController::class,'createDistrict'])->name('district');
Route::post('district/store',[ShippingAreaController::class,'storeDistrict'])->name('district-store');
Route::get('district-edit/{id}', [ShippingAreaController::class,'districtEdit']);
Route::post('district/update',[ShippingAreaController::class,'districtUpdate'])->name('district-update');
Route::get('district-delete/{id}',[ShippingAreaController::class,'districtDestroy']);
// shipping area upzilla
Route::get('upzilla',[ShippingAreaController::class,'createUpzilla'])->name('upzilla');
Route::get('district-get/ajax/{division_id}',[ShippingAreaController::class,'getDistrictAjax']);
Route::post('upzilla/store',[ShippingAreaController::class,'storeUpzilla'])->name('upzilla-store');
Route::get('upzilla-edit/{id}', [ShippingAreaController::class,'upzillaEdit']);
Route::post('upzilla/update',[ShippingAreaController::class,'upzillaUpdate'])->name('upzilla-update');
Route::get('upzilla-delete/{id}',[ShippingAreaController::class,'upzillaDestroy']);
// orders
Route::get('pending-orders',[OrderController::class,'pendingOrder'])->name('pending-orders');
Route::get('orders-view/{id}',[OrderController::class,'viewOrder']);
Route::get('confirmed-orders',[OrderController::class,'confirmedOrder'])->name('confirmed-orders');
Route::get('processing-orders',[OrderController::class,'processingOrder'])->name('processing-orders');
Route::get('picked-orders',[OrderController::class,'pickedOrder'])->name('picked-orders');
Route::get('shipped-orders',[OrderController::class,'shippedOrder'])->name('shipped-orders');
Route::get('delivered-orders',[OrderController::class,'deliveredOrder'])->name('delivered-orders');
Route::get('cancel-orders',[OrderController::class,'cancelOrder'])->name('cancel-orders');
// status
Route::get('pending-to-confirm/{order_id}',[OrderController::class,'pendingToConfirm']);
Route::get('pending-to-cancel/{order_id}',[OrderController::class,'pendingToCancel']);
Route::get('confirm-to-processing/{order_id}',[OrderController::class,'confirmToProcess']);
Route::get('processing-to-picked/{order_id}',[OrderController::class,'processToPicked']);
Route::get('picked-to-shipped/{order_id}',[OrderController::class,'pickedToShipped']);
Route::get('shipped-to-delivery/{order_id}',[OrderController::class,'shippedToDelivery']);
// invoice download
Route::get('invoice-download/{order_id}',[OrderController::class,'downloadInvoice']);
// reports
Route::get('reports',[ReportController::class,'index'])->name('reports');
Route::post('report/by-date',[ReportController::class,'searchByDate'])->name('search-by-date');
Route::post('report/by-month',[ReportController::class,'searchByMonth'])->name('search-by-month');
Route::post('report/by-year',[ReportController::class,'searchByYear'])->name('search-by-year');
// customer review
Route::get('cutomer-review',[ProductReviewController::class,'create'])->name('customer.review');
Route::get('review-delete/{review_id}',[ProductReviewController::class,'destroy']);
Route::get('review-approve/{review_id}',[ProductReviewController::class,'approveNow']);
// stock management
Route::get('product-stock',[StockController::class,'index'])->name('product.stock');
Route::get('product-stock/edit/{id}',[StockController::class,'edit'])->name('stock-edit');
Route::post('product-stock/update/{id}',[StockController::class,'update'])->name('stock-update');

// role & permission
Route::resource('role',RoleController::class);
Route::resource('permission',PermissionController::class);
Route::resource('subadmin',SubadminController::class);
});

// ======================== User Routes =======================
Route::group(['prefix'=>'user','middleware'=>['user','auth']], function(){
 Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
 Route::post('update/data',[UserController::class,'updateData'])->name('update-profile');
 Route::get('image',[UserController::class,'imagePage'])->name('user-image');
 Route::post('update/image',[UserController::class,'updateImage'])->name('update-image');
 Route::get('update/password',[UserController::class,'updatePassPage'])->name('update-password');
 Route::post('store/password',[UserController::class,'storePassword'])->name('password-store');

 Route::get('wishlist',[WishlistController::class,'create'])->name('wishlist');
 Route::get('/get-wishlist-product',[WishlistController::class,'readAllProduct']);
 Route::get('/wishlist-remove/{id}',[WishlistController::class,'wishlistRemove']);
//  checkout
Route::get('district-get/ajax/{division_id}',[CheckoutController::class,'getDistrictWithAjax']);
Route::get('upzilla-get/ajax/{district_id}',[CheckoutController::class,'getUpzillaWithAjax']);
Route::post('payment',[CheckoutController::class,'storeCheckout'])->name('user.checkout.store');
Route::post('stripe/order-complete',[StripeController::class,'store'])->name('stripe.order');
// users orsers show
Route::get('/order',[UserController::class,'orderCreate'])->name('my-orders');
Route::get('/order-view/{order_id}',[UserController::class,'orderView']);
Route::get('/invoice-download/{order_id}',[UserController::class,'invoiceDownload']);
// return orders
Route::post('return/orders-submit',[UserController::class,'returnOrderSubmit'])->name('user-return-order');
Route::get('return/order',[UserController::class,'returnOrder'])->name('return-orders');
Route::get('cancel/order',[UserController::class,'cancelOrder'])->name('user-cancel-orders');
// review create
Route::get('review-create/{product_id}',[ReviewController::class,'create']);
Route::post('store/review',[ReviewController::class,'store'])->name('store.review');

});

// SSLCOMMERZ Start
Route::group(['middleware'=>['user','auth']], function(){
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
});
//SSLCOMMERZ END

// ======================== Frontend Routes =======================

Route::get('language/bangla',[LanguageController::class,'bangla'])->name('bangla.language');
Route::get('language/english',[LanguageController::class,'english'])->name('english.language');

Route::get('single/product/{id}/{slug}',[IndexController::class,'singleProduct']);

// product taga
Route::get('product/tag/{tag}',[IndexController::class,'tagWiseProduct']);
// subcategory wise product show
Route::get('subcategory/product/{subcat_id}/{slug}',[IndexController::class,'subCateWiseProduct']);
Route::get('sub/subcategory/product/{subsubcat_id}/{slug}',[IndexController::class,'subSubCateWiseProduct']);

// product view modal with ajax
Route::get('product/view/modal/{id}',[IndexController::class,'productViewAjax']);

// cart
Route::post('/cart/data/store/{id}',[CartController::class,'addToCart']);
Route::get('my-cart',[CartController::class,'create'])->name('cart');
Route::get('/get-cart-product',[CartController::class,'getAllCart']);
Route::get('/cart-remove/{id}',[CartController::class,'destroy']);
Route::post('/cart-increment/{id}',[CartController::class,'cartIncrement']);
Route::post('/cart-decrement/{id}',[CartController::class,'cartDecrement']);

// mini cart
Route::get('/product/mini/cart',[CartController::class,'miniCart']);
Route::get('/minicart/product-remove/{rowId}',[CartController::class,'miniCartRemove']);
// add to wishlist
Route::post('/add-to-wishlist/{product_id}',[CartController::class,'addToWishlist']);
// coupon
Route::post('/coupon-apply',[CartController::class,'couponApply']);
Route::get('/coupon-calculation',[CartController::class,'couponCalculation']);
Route::get('/coupon-remove',[CartController::class,'couponRemove']);
// checkout
Route::get('/user/checkout',[CartController::class,'checkoutCreate'])->name('checkout');

// laravel sociolite
// login google
Route::get('login/google',[LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[LoginController::class,'handleGoogleCallback']);

// login google
Route::get('login/facebook',[LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback',[LoginController::class,'handleFacebookCallback']);

// Order track
Route::post('order/track',[TrackingController::class,'orderTrackNow'])->name('order.track');
// search Product
Route::get('search-products',[SearchController::class,'searchProducts'])->name('search.product');
Route::post('find-products',[SearchController::class,'findProducts']);

// Shop
Route::get('shop',[ShopController::class,'shopPage'])->name('shop');
Route::post('shop-filter',[ShopController::class,'shopFilter'])->name('shop.filter');