<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;

Route::get('/',[HomeController::class,'home']);
Route::get('/search_results', [SearchController::class,'searchResults']);

Route::get('/register',[RegisterController::class,'registerPage']);
Route::post('/register',[RegisterController::class,'register']);

Route::get('/login',[LoginController::class,'loginPage']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/onboarding',[HomeController::class,'onboardingPage']);
Route::post('/onboarding',[HomeController::class,'onboarding']);

Route::get('/user/{section?}',[UserProfileController::class,'profilePage']);
Route::post('/user/personal',[UserProfileController::class,'personalInfo']);
Route::post('/user/address',[UserProfileController::class,'addressInfo']);
Route::post('/user/security',[UserProfileController::class,'securityInfo']);

Route::get('/product/{product_id}/{section?}',[ProductController::class,'productPage']);
Route::post('/product/{product_id}/review',[ProductController::class,'addReview']);

Route::get('/cart',[CartController::class,'cartPage']);
Route::post('/cart/products/{product_id}/add',[CartController::class,'addProduct']);
Route::post('/cart/products/{product_id}/update',[CartController::class,'updateProduct']);
Route::get('/checkout',[CheckoutController::class,'checkoutPage']);
Route::post('/checkout',[CheckoutController::class,'createOrder']);

Route::get('/business/register',[BusinessController::class,'createBusinessPage']);
Route::post('/business/register',[BusinessController::class,'createBusiness']);
Route::get('/business/{section?}',[BusinessController::class,'businessPage']);
Route::post('/business/basic', [BusinessController::class, 'basicInfo']);
Route::post('/business/products', [BusinessController::class, 'createProduct']);
Route::post('/business/products/{product_id}', [BusinessController::class, 'updateProduct']);








