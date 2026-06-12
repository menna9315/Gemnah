<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Http\Controllers\AboutUsController;
use Modules\Backend\Http\Controllers\Auth\LoginController;
use Modules\Backend\Http\Controllers\CategoryController;
use Modules\Backend\Http\Controllers\ColorController;
use Modules\Backend\Http\Controllers\CollectionController;
use Modules\Backend\Http\Controllers\ContactController;
use Modules\Backend\Http\Controllers\ContactMessageController;
use Modules\Backend\Http\Controllers\DashboardController;
use Modules\Backend\Http\Controllers\ExchangeRefundPolicyParagraphController;
use Modules\Backend\Http\Controllers\HomeBannerController;
use Modules\Backend\Http\Controllers\HomeVideoController;
use Modules\Backend\Http\Controllers\JoinUsController;
use Modules\Backend\Http\Controllers\OrderController;
use Modules\Backend\Http\Controllers\PrivacyPolicyParagraphController;
use Modules\Backend\Http\Controllers\ProductController;
use Modules\Backend\Http\Controllers\ProductImageController;
use Modules\Backend\Http\Controllers\ProductItemCostController;
use Modules\Backend\Http\Controllers\ProductItemController;
use Modules\Backend\Http\Controllers\ProductItemImageController;
use Modules\Backend\Http\Controllers\ShippingFeeController;
use Modules\Backend\Http\Controllers\ShippingPolicyParagraphController;
use Modules\Backend\Http\Controllers\SizeController;
use Modules\Backend\Http\Controllers\TermsConditionsParagraphController;

Route::redirect('/login', '/backend/login')->name('login');

Route::prefix('backend')->name('backend.')->group(function () {
    Route::redirect('/', '/backend/dashboard');

    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);
        Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [LoginController::class, 'register']);
    });

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
        Route::resource('about-us', AboutUsController::class)
            ->parameters(['about-us' => 'aboutUs'])
            ->except(['show']);
        Route::resource('home-banners', HomeBannerController::class)
            ->parameters(['home-banners' => 'homeBanner'])
            ->except(['show']);
        Route::resource('home-videos', HomeVideoController::class)
            ->parameters(['home-videos' => 'homeVideo'])
            ->except(['show', 'destroy']);
        Route::resource('orders', OrderController::class)
            ->only(['index', 'show']);
        Route::post('orders/{order}/confirm', [OrderController::class, 'confirm'])
            ->name('orders.confirm');
        Route::post('orders/{order}/shipping-company', [OrderController::class, 'shippingCompany'])
            ->name('orders.shipping-company');
        Route::post('orders/{order}/deliver', [OrderController::class, 'deliver'])
            ->name('orders.deliver');
        Route::resource('colors', ColorController::class);
        Route::resource('sizes', SizeController::class);
        Route::resource('collections', CollectionController::class);
        Route::resource('collections.categories', CategoryController::class)
            ->except(['index']);
        Route::resource('collections.categories.products', ProductController::class)
            ->except(['index']);
        Route::resource('collections.categories.products.images', ProductImageController::class)
            ->parameters(['images' => 'productImage'])
            ->except(['index']);
        Route::resource('collections.categories.products.items', ProductItemController::class)
            ->parameters(['items' => 'item'])
            ->except(['index']);
        Route::resource('collections.categories.products.items.images', ProductItemImageController::class)
            ->parameters(['items' => 'item', 'images' => 'productItemImage'])
            ->except(['index']);
        Route::resource('collections.categories.products.items.costs', ProductItemCostController::class)
            ->parameters(['items' => 'item', 'costs' => 'productItemCost'])
            ->except(['index']);
        Route::resource('contacts', ContactController::class)
            ->except(['show', 'destroy']);
        Route::resource('shipping-fees', ShippingFeeController::class)
            ->except(['show', 'destroy']);
        Route::resource('contact-messages', ContactMessageController::class)
            ->only(['index', 'show', 'destroy']);
        Route::resource('terms-conditions', TermsConditionsParagraphController::class)
            ->parameters(['terms-conditions' => 'termsConditionsParagraph'])
            ->except(['show']);
        Route::resource('privacy-policy', PrivacyPolicyParagraphController::class)
            ->parameters(['privacy-policy' => 'privacyPolicyParagraph'])
            ->except(['show']);
        Route::resource('exchange-refund-policy', ExchangeRefundPolicyParagraphController::class)
            ->parameters(['exchange-refund-policy' => 'exchangeRefundPolicyParagraph'])
            ->except(['show']);
        Route::resource('shipping-policy', ShippingPolicyParagraphController::class)
            ->parameters(['shipping-policy' => 'shippingPolicyParagraph'])
            ->except(['show']);
        Route::get('join-us', [JoinUsController::class, 'index'])->name('join-us.index');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });
});
