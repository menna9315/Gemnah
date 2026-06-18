<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\Auth\CustomerAuthController;
use Modules\Frontend\Http\Controllers\CartController;
use Modules\Frontend\Http\Controllers\CheckoutController;
use Modules\Frontend\Http\Controllers\HomeController;

Route::get('/', HomeController::class)->name('frontend.home');
Route::get('/account/login', [CustomerAuthController::class, 'showLoginForm'])->name('frontend.login');
Route::post('/account/login', [CustomerAuthController::class, 'login'])->name('frontend.login.store');
Route::get('/account/register', [CustomerAuthController::class, 'showRegisterForm'])->name('frontend.register');
Route::post('/account/register', [CustomerAuthController::class, 'register'])->name('frontend.register.store');
Route::get('/account', [CustomerAuthController::class, 'account'])->name('frontend.account');
Route::get('/account/orders', [CustomerAuthController::class, 'orders'])->name('frontend.orders');
Route::post('/account/logout', [CustomerAuthController::class, 'logout'])->name('frontend.logout');
Route::post('/cart/items/{item}', [CartController::class, 'store'])->name('frontend.cart.items.store');
Route::patch('/cart/items/{cartItem}', [CartController::class, 'update'])->name('frontend.cart.items.update');
Route::delete('/cart/items/{cartItem}', [CartController::class, 'destroy'])->name('frontend.cart.items.destroy');
Route::get('/checkout', [CheckoutController::class, 'show'])->name('frontend.checkout');
Route::get('/checkout/shipping-fee', [CheckoutController::class, 'shippingFee'])->name('frontend.checkout.shipping-fee');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('frontend.checkout.store');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('frontend.checkout.success');
Route::get('/products', [HomeController::class, 'products'])->name('frontend.products.index');
Route::get('/products/{category:slug}/{item:slug}', [HomeController::class, 'productItemDetails'])
    ->withoutScopedBindings()
    ->name('frontend.products.item');
Route::get('/products/{category:slug}', [HomeController::class, 'categoryProducts'])->name('frontend.products.category');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('frontend.about-us');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('frontend.contact-us');
Route::post('/contact-us', [HomeController::class, 'storeContactMessage'])->name('frontend.contact-us.store');
Route::get('/terms-conditions', [HomeController::class, 'termsConditions'])->name('frontend.terms-conditions');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('frontend.privacy-policy');
Route::get('/exchange-refund-policy', [HomeController::class, 'exchangeRefundPolicy'])->name('frontend.exchange-refund-policy');
Route::get('/shipping-policy', [HomeController::class, 'shippingPolicy'])->name('frontend.shipping-policy');
Route::post('/join-us', [HomeController::class, 'storeJoinUs'])->name('frontend.join-us.store');
