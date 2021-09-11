<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PasswordRecovery;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitePagesController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;


// shop
Route::get('/',[SitePagesController::class,'index'])->name('site.index');
Route::get('/shop',[SitePagesController::class,'shop'])->name('site.shop');
Route::get('/product/{id}',[SitePagesController::class,'productPage'])->name('site.productPage');
Route::get('/search',[SitePagesController::class,'search'])->name('site.search');

Route::group(['prefix' => '', 'middleware'=> 'user'], function()
    {    
        Route::post('posts/sendComment',[SitePagesController::class,'sendComment'])->name('site.sendComment');

        Route::get('/profile/{logedUser}',[UserProfileController::class,'userProfile'])->name('site.userProfile');
        Route::post('/profile/edit/{logedUser}',[UserProfileController::class,'userProfileEdit'])->name('site.userProfileEdit');
        Route::post('/profile/passwordEdit/{logedUser}',[UserProfileController::class,'userPasswordEdit'])->name('site.userPasswordEdit');

    });


// register and login
Route::get('/login',[AuthController::class,'loginPage'])->name('admin.login');
Route::get('/register',[AuthController::class,'registerPage'])->name('admin.signup');
Route::post('/createAccount',[AuthController::class,'createAccount'])->name('admin.createAccount');
Route::post('/loginAccount',[AuthController::class,'loginAccount'])->name('admin.loginAccount');
Route::get('/logoutAccount',[AuthController::class,'logoutAccount'])->name('admin.logoutAccount');

//password recovery
Route::post('/userPasswordRecovery',[PasswordRecovery::class,'userPasswordRecovery'])->name('admin.userPasswordRecovery');
Route::get('/passwordReset/{code}',[PasswordRecovery::class,'passwordReset'])->name('admin.passwordReset');
Route::post('/passwordResetSubmit/{code}',[PasswordRecovery::class,'passwordResetSubmit'])->name('admin.passwordResetSubmit');


Route::group(['prefix' => 'admin', 'middleware'=>'admin'],function(){
    // dashboard
    Route::get('/dashboard',[AdminPagesController::class,'dashboard'])->name('admin.dashboard');

    // categories
    Route::get('/categories',[CategoryController::class,'index'])->name('admin.categories');
    Route::post('/addCategory',[CategoryController::class,'add'])->name('admin.addCategory');
    Route::post('/editCategory/{id}',[CategoryController::class,'edit'])->name('admin.editCategory');
    Route::get('/deleteCategory/{id}',[CategoryController::class,'delete'])->name('admin.deleteCategory');

    // products
    Route::get('/products',[ProductController::class,'index'])->name('admin.products');
    Route::post('/addProduct',[ProductController::class,'add'])->name('admin.addProduct');
    Route::post('/editProduct/{id}',[ProductController::class,'edit'])->name('admin.editProduct');
    Route::get('/deleteProduct/{id}',[ProductController::class,'delete'])->name('admin.deleteProduct');

    //customers
    Route::get('/customers',[CustomerController::class,'index'])->name('admin.customers');
    Route::get('/deleteCustomer/{id}',[CustomerController::class,'delete'])->name('admin.deleteCustomer');

    // coupons
    Route::get('/coupons',[CouponsController::class,'index'])->name('admin.coupons');
    Route::post('/addCoupon',[CouponsController::class,'add'])->name('admin.addCoupon');
    Route::post('/editCoupon/{id}',[CouponsController::class,'edit'])->name('admin.editCoupon');
    Route::get('/deleteCoupon/{id}',[CouponsController::class,'delete'])->name('admin.deleteCoupon');
});
