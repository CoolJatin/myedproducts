<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use Facade\Ignition\Middleware\AddLogs;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;

Auth::routes();
// Route::get('login',[AdminController::class,'Admin']);
Route::get('admin',[AdminController::class,'Admin']);
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    //category rought
    Route::get('category',[AdminController::class,'Category'])->name('category');
    Route::Post('addcategory',[AdminController::class,'addcategory'])->name('addcategory');
    Route::get('editcategory/{id}',[AdminController::class,'editcategory'])->name('editcategory');
    Route::get('removecategory/{id}',[AdminController::class,'removecategory'])->name('removecategory');
    //product Route
    Route::get('product',[AdminController::class,'product'])->name('product');
    Route::get('createproduct',[AdminController::class,'createproduct'])->name('createproduct');
    Route::Post('addproduct',[AdminController::class,'addproduct'])->name('addproduct');
    Route::get('editproduct/{id}',[AdminController::class,'editproduct'])->name('editproduct');
    //edit image
    Route::get('editimage/{id}',[AdminController::class,'editimage'])->name('editimage');
    Route::get('editgallery/{id}',[AdminController::class,'editgallery'])->name('editgallery');
    Route::Post('updategallery',[AdminController::class,'UpdateGallery'])->name('ipdategallery');
    Route::get('removegallery/{id}',[AdminController::class,'removegallery'])->name('removegallery');
    Route::get('addmultiprice/{id}',[AdminController::class,'addmultiprice'])->name('addmultiprice');
    Route::Post('savesize',[AdminController::class,'SaveSize'])->name('savesize');
    Route::get('editsize/{id}',[AdminController::class,'editsize'])->name('editsize');
    Route::get('removeprice/{id}',[AdminController::class,'removeprice'])->name('removeprice');

    //about us
    Route::get('about-us',[AdminController::class,'aboutus'])->name('about-us');
    Route::Post('createabout',[AdminController::class,'createAbout'])->name('createabout');
    // 
    Route::get('orders',[AdminController::class,'orders'])->name('orders');
    Route::get('removeproduct/{id}',[AdminController::class,'removeproduct'])->name('removeproduct');
});

Route::get('/', [IndexController::class, 'index'])->name('adminlogin');
Route::Post('adminlogin',[AdminController::class,'adminlogin'])->name('adminlogin');
Route::get('adminlogout',[AdminController::class,'adminlogout'])->name('adminlogout');

// web user login route

Route::Post('loginuser',[IndexController::class,'loginuser'])->name('loginuser');
Route::get('myaccount',[IndexController::class,'myaccount'])->name('myaccount');
Route::Post('register',[IndexController::class,'register'])->name('register');
Route::get('logoutuser',[IndexController::class,'logoutuser'])->name('logoutuser');
Route::get('forget-password',[IndexController::class,'forgetpassword'])->name('forget-password');
Route::post('emailmatch',[IndexController::class,'emailmatch'])->name('emailmatch');
Route::get('otp',[IndexController::class,'otp'])->name('otp');
Route::post('fillotp',[IndexController::class,'fillotp'])->name('fillotp');



Route::get('cart',[IndexController::class,'Cart'])->name('cart');
Route::get('checkout',[App\Http\Controllers\IndexController::class, 'checkout'])->name('checkout');

Route::Post('placeorder',[App\Http\Controllers\IndexController::class, 'placeorder'])->name('placeorder');

Route::get('about',[App\Http\Controllers\IndexController::class, 'about'])->name('about');
Route::get('shop',[App\Http\Controllers\IndexController::class, 'shop'])->name('shop');
Route::get('faq',[App\Http\Controllers\IndexController::class, 'faq'])->name('faq');
Route::get('delivery-info',[App\Http\Controllers\IndexController::class, 'deliveryInfo'])->name('delivery-info');


Route::get('remove/{id}',[IndexController::class,'remove'])->name('remove');
Route::Post('addtocart',[App\Http\Controllers\AddToCart::class, 'AddToCartItem'])->name('addtocart');
Route::get('shop-product/{id}', [IndexController::class,'ShopProduct'])->name('shop-product');


Route::get('myorder', [IndexController::class,'myorderuser'])->name('myorder');

Route::get('myprice/{id}',[IndexController::class,'myprice'])->name('myprice');

Route::get('qtyrun/{id}/{any}',[IndexController::class,'qtyrun'])->name('qtyrun');

Route::Post('sdfsdfsd',[IndexController::class,'matchotp'])->name('ssdfsdfsfd');

Route::get('product',[IndexController::class,'myAllProduct'])->name('product');
Route::get('forgotpassword',[IndexController::class,'forgotpassword'])->name('forgotpassword');
Route::get('thankyou',[IndexController::class,'thankyou'])->name('thankyou');
Route::get('{page}',[IndexController::class,'page'])->name('page');
