<?php

namespace Modules\Frontend\Providers;

use Illuminate\Support\Facades\View;
use Modules\Backend\Models\Category;
use Modules\Backend\Models\Contact;
use Modules\Frontend\Services\CartManager;
use Nwidart\Modules\Support\ModuleServiceProvider;

class FrontendServiceProvider extends ModuleServiceProvider
{
    protected string $name = 'Frontend';

    protected string $nameLower = 'frontend';

    protected array $providers = [
        RouteServiceProvider::class,
    ];

    public function boot(): void
    {
        parent::boot();

        $menuCategories = function () {
            static $categories = null;

            if ($categories === null) {
                $categories = Category::query()
                    ->where('show_in_menu', true)
                    ->where('show_in_store', true)
                    ->whereHas('collection', function ($query) {
                        $query->where('show_in_menu', true)
                            ->where('show_in_store', true);
                    })
                    ->orderBy('category_order')
                    ->orderBy('title')
                    ->get(['id', 'title', 'slug']);
            }

            return $categories;
        };

        View::composer('frontend::partials.footer', function ($view) use ($menuCategories) {
            $view->with('footerContact', Contact::first())
                ->with('frontendMenuCategories', $menuCategories());
        });

        View::composer(['frontend::partials.header', 'frontend::partials.extras'], function ($view) use ($menuCategories) {
            $cart = app(CartManager::class)->cartWithItems();

            $view->with('frontendMenuCategories', $menuCategories())
                ->with('frontendCart', $cart)
                ->with('frontendCartItems', $cart?->items ?? collect())
                ->with('frontendCartCount', $cart ? (int) $cart->items->sum('quantity') : 0)
                ->with('frontendCartSubtotal', $cart ? (float) $cart->subtotal : 0);
        });
    }
}
