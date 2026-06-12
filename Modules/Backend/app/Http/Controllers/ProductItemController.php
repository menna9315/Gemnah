<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\Category;
use Modules\Backend\Models\Collection;
use Modules\Backend\Models\Color;
use Modules\Backend\Models\Product;
use Modules\Backend\Models\ProductItem;
use Modules\Backend\Models\Size;

class ProductItemController
{
    use HandlesImageValidation;

    public function create(Collection $collection, Category $category, Product $product)
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        return view('backend::product-items.create', $this->formData($collection, $category, $product, new ProductItem([
            'manual_order' => 0,
            'stock_quantity' => 0,
            'selling_price' => 0,
            'original_price' => 0,
            'discount_value' => 0,
            'price_after_discount' => 0,
            'taxes' => 0,
            'show_in_store' => true,
            'show_in_menu' => true,
        ])));
    }

    public function store(Request $request, Collection $collection, Category $category, Product $product)
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        $data = $this->validatedData($request);
        $data['image'] = $this->storeImage($request, 'image');
        $data['home_image'] = $this->storeImage($request, 'home_image');
        $data['size_chart_image'] = $this->storeImage($request, 'size_chart_image');

        $product->items()->create($data);

        return redirect()
            ->route('backend.collections.categories.products.show', [$collection, $category, $product])
            ->with('success', 'Product item created successfully.');
    }

    public function show(Collection $collection, Category $category, Product $product, ProductItem $item)
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        $item->load(['color', 'size']);

        $itemImages = $item->itemImages()
            ->orderBy('item_order')
            ->latest()
            ->paginate(10, ['*'], 'item_images_page');

        $itemCosts = $item->costs()
            ->latest()
            ->paginate(10, ['*'], 'item_costs_page');

        $itemCostsTotal = $item->costs()->sum('value');

        return view('backend::product-items.show', compact('collection', 'category', 'product', 'item', 'itemImages', 'itemCosts', 'itemCostsTotal'));
    }

    public function edit(Collection $collection, Category $category, Product $product, ProductItem $item)
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        return view('backend::product-items.edit', $this->formData($collection, $category, $product, $item));
    }

    public function update(Request $request, Collection $collection, Category $category, Product $product, ProductItem $item)
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        $data = $this->validatedData($request, $item);

        foreach (['image', 'home_image', 'size_chart_image'] as $field) {
            if ($request->hasFile($field)) {
                $this->deleteImage($item->{$field});
                $data[$field] = $this->storeImage($request, $field);
            }
        }

        $item->update($data);

        return redirect()
            ->route('backend.collections.categories.products.show', [$collection, $category, $product])
            ->with('success', 'Product item updated successfully.');
    }

    public function destroy(Collection $collection, Category $category, Product $product, ProductItem $item)
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        foreach (['image', 'home_image', 'size_chart_image'] as $field) {
            $this->deleteImage($item->{$field});
        }

        $item->delete();

        return redirect()
            ->route('backend.collections.categories.products.show', [$collection, $category, $product])
            ->with('success', 'Product item deleted successfully.');
    }

    private function formData(Collection $collection, Category $category, Product $product, ProductItem $item): array
    {
        return [
            'collection' => $collection,
            'category' => $category,
            'product' => $product,
            'item' => $item,
            'colors' => Color::orderBy('name')->get(),
            'sizes' => Size::orderBy('value')->get(),
        ];
    }

    private function validatedData(Request $request, ?ProductItem $item = null): array
    {
        $itemId = $item?->id;

        $request->merge([
            'slug' => $request->filled('slug')
                ? Str::slug($request->input('slug'))
                : Str::slug($request->input('title', '')),
        ]);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_items', 'slug')->ignore($itemId),
            ],
            'description' => ['nullable', 'string'],
            'description2' => ['nullable', 'string'],
            'image' => $this->imageRules(),
            'home_image' => $this->imageRules(),
            'item_code' => ['nullable', 'string', 'max:255'],
            'manual_order' => ['nullable', 'integer', 'min:0'],
            'stock_quantity' => ['nullable', 'integer', 'min:0', 'max:4294967295'],
            'selling_price' => ['nullable', 'numeric', 'min:0', 'max:99999999.99'],
            'original_price' => ['nullable', 'numeric', 'min:0', 'max:99999999.99'],
            'discount_value' => ['nullable', 'numeric', 'min:0', 'max:99999999.99'],
            'price_after_discount' => ['nullable', 'numeric', 'min:0', 'max:99999999.99'],
            'taxes' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'color_id' => ['nullable', 'integer', Rule::exists('colors', 'id')],
            'size_id' => ['nullable', 'integer', Rule::exists('sizes', 'id')],
            'fabric' => ['nullable', 'string', 'max:255'],
            'is_best_seller' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'is_out_of_stock' => ['nullable', 'boolean'],
            'size_chart_image' => $this->imageRules(),
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'show_in_store' => ['nullable', 'boolean'],
            'show_in_menu' => ['nullable', 'boolean'],
        ]);

        unset($data['image'], $data['home_image'], $data['size_chart_image']);

        $data['manual_order'] = (int) ($data['manual_order'] ?? 0);
        $data['stock_quantity'] = (int) ($data['stock_quantity'] ?? 0);

        foreach (['selling_price', 'original_price', 'discount_value', 'price_after_discount', 'taxes'] as $field) {
            $data[$field] = number_format((float) ($data[$field] ?? 0), 2, '.', '');
        }

        foreach (['color_id', 'size_id'] as $field) {
            $data[$field] = $data[$field] ?? null;
        }

        $data['is_best_seller'] = $request->boolean('is_best_seller');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_out_of_stock'] = $request->boolean('is_out_of_stock');
        $data['show_in_store'] = $request->boolean('show_in_store');
        $data['show_in_menu'] = $request->boolean('show_in_menu');

        return $data;
    }

    private function storeImage(Request $request, string $field): ?string
    {
        if (! $request->hasFile($field)) {
            return null;
        }

        $directory = public_path('uploads/product-items');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file($field);
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/product-items/'.$filename;
    }

    private function deleteImage(?string $path): void
    {
        if (! $path) {
            return;
        }

        $fullPath = public_path($path);

        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }

    private function ensureProductItemPathIsValid(Collection $collection, Category $category, Product $product, ProductItem $item): void
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        abort_if($item->product_id !== (int) $product->id, 404);
    }

    private function ensureProductPathIsValid(Collection $collection, Category $category, Product $product): void
    {
        $this->ensureCategoryBelongsToCollection($collection, $category);

        abort_if($product->category_id !== (int) $category->id, 404);
    }

    private function ensureCategoryBelongsToCollection(Collection $collection, Category $category): void
    {
        abort_if($category->collection_id !== (int) $collection->id, 404);
    }
}
