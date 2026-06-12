<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\AboutUs;
use Modules\Backend\Models\Category;
use Modules\Backend\Models\Contact;
use Modules\Backend\Models\ContactMessage;
use Modules\Backend\Models\ExchangeRefundPolicyParagraph;
use Modules\Backend\Models\JoinUs;
use Modules\Backend\Models\PrivacyPolicyParagraph;
use Modules\Backend\Models\ProductItem;
use Modules\Backend\Models\ShippingPolicyParagraph;
use Modules\Backend\Models\TermsConditionsParagraph;

class HomeController
{
    public function __invoke()
    {
        return $this->home();
    }

    public function home()
    {
        return view('frontend::pages.home');
    }

    public function aboutUs()
    {
        $paragraphs = AboutUs::query()
            ->orderBy('paragraph_order')
            ->orderBy('id')
            ->get(['id', 'title', 'description']);

        return view('frontend::pages.about-us', compact('paragraphs'));
    }

    public function categoryProducts(Category $category)
    {
        abort_unless($category->show_in_store, 404);

        $category->load('collection');
        abort_unless($category->collection?->show_in_store, 404);

        $productItems = ProductItem::query()
            ->with([
                'color',
                'size',
                'itemImages' => function ($query) {
                    $query->orderBy('item_order')
                        ->orderBy('id');
                },
                'product',
            ])
            ->where('show_in_store', true)
            ->whereHas('product', function ($query) use ($category) {
                $query->where('category_id', $category->id)
                    ->where('show_in_store', true);
            })
            ->orderBy('manual_order')
            ->latest()
            ->paginate(12);

        return view('frontend::pages.category-products', compact('category', 'productItems'));
    }

    public function productItemDetails(Category $category, ProductItem $item)
    {
        abort_unless($category->show_in_store, 404);

        $category->load('collection');
        abort_unless($category->collection?->show_in_store, 404);

        $item->load([
            'color',
            'size',
            'itemImages' => function ($query) {
                $query->orderBy('item_order')
                    ->orderBy('id');
            },
            'product.category.collection',
        ]);

        abort_unless($item->show_in_store, 404);
        abort_unless($item->product?->show_in_store, 404);
        abort_unless($item->product?->category_id === $category->id, 404);

        $relatedProductItems = ProductItem::query()
            ->with([
                'color',
                'size',
                'itemImages' => function ($query) {
                    $query->orderBy('item_order')
                        ->orderBy('id');
                },
                'product.category',
            ])
            ->where('id', '!=', $item->id)
            ->where('show_in_store', true)
            ->whereHas('product', function ($query) {
                $query->where('show_in_store', true)
                    ->whereHas('category', function ($query) {
                        $query->where('show_in_store', true)
                            ->whereHas('collection', function ($query) {
                                $query->where('show_in_store', true);
                            });
                    });
            })
            ->orderByDesc('is_featured')
            ->orderByDesc('is_best_seller')
            ->orderBy('manual_order')
            ->latest()
            ->limit(4)
            ->get();

        return view('frontend::pages.product-item-details', compact('category', 'item', 'relatedProductItems'));
    }

    public function contactUs()
    {
        $contact = Contact::first();

        return view('frontend::pages.contact-us', compact('contact'));
    }

    public function termsConditions()
    {
        $paragraphs = TermsConditionsParagraph::query()
            ->orderBy('paragraph_order')
            ->orderBy('id')
            ->get(['id', 'title', 'description']);

        return view('frontend::pages.terms-conditions', compact('paragraphs'));
    }

    public function privacyPolicy()
    {
        $paragraphs = PrivacyPolicyParagraph::query()
            ->orderBy('paragraph_order')
            ->orderBy('id')
            ->get(['id', 'title', 'description']);

        return view('frontend::pages.privacy-policy', compact('paragraphs'));
    }

    public function exchangeRefundPolicy()
    {
        $paragraphs = ExchangeRefundPolicyParagraph::query()
            ->orderBy('paragraph_order')
            ->orderBy('id')
            ->get(['id', 'title', 'description']);

        return view('frontend::pages.exchange-refund-policy', compact('paragraphs'));
    }

    public function shippingPolicy()
    {
        $paragraphs = ShippingPolicyParagraph::query()
            ->orderBy('paragraph_order')
            ->orderBy('id')
            ->get(['id', 'title', 'description']);

        return view('frontend::pages.shipping-policy', compact('paragraphs'));
    }

    public function storeContactMessage(Request $request)
    {
        ContactMessage::create($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]));

        return redirect()
            ->route('frontend.contact-us')
            ->with('success', 'Your message has been sent successfully.');
    }

    public function storeJoinUs(Request $request)
    {
        $data = $request->validate([
            'join_email' => ['required', 'email', 'max:255'],
        ]);

        JoinUs::create([
            'email' => $data['join_email'],
        ]);

        return back()->with('join_success', 'Thank you for joining our family.');
    }
}
