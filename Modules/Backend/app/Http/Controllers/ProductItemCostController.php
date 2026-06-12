<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\Category;
use Modules\Backend\Models\Collection;
use Modules\Backend\Models\Product;
use Modules\Backend\Models\ProductItem;
use Modules\Backend\Models\ProductItemCost;

class ProductItemCostController
{
    public function create(Collection $collection, Category $category, Product $product, ProductItem $item)
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        return view('backend::product-item-costs.create', [
            'collection' => $collection,
            'category' => $category,
            'product' => $product,
            'item' => $item,
            'productItemCost' => new ProductItemCost(['value' => 0]),
        ]);
    }

    public function store(Request $request, Collection $collection, Category $category, Product $product, ProductItem $item)
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        $item->costs()->create($this->validatedData($request));

        return redirect()
            ->route('backend.collections.categories.products.items.show', [$collection, $category, $product, $item])
            ->with('success', 'Product item cost created successfully.');
    }

    public function show(Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemCost $productItemCost)
    {
        $this->ensureProductItemCostPathIsValid($collection, $category, $product, $item, $productItemCost);

        return view('backend::product-item-costs.show', compact('collection', 'category', 'product', 'item', 'productItemCost'));
    }

    public function edit(Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemCost $productItemCost)
    {
        $this->ensureProductItemCostPathIsValid($collection, $category, $product, $item, $productItemCost);

        return view('backend::product-item-costs.edit', compact('collection', 'category', 'product', 'item', 'productItemCost'));
    }

    public function update(Request $request, Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemCost $productItemCost)
    {
        $this->ensureProductItemCostPathIsValid($collection, $category, $product, $item, $productItemCost);

        $productItemCost->update($this->validatedData($request));

        return redirect()
            ->route('backend.collections.categories.products.items.show', [$collection, $category, $product, $item])
            ->with('success', 'Product item cost updated successfully.');
    }

    public function destroy(Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemCost $productItemCost)
    {
        $this->ensureProductItemCostPathIsValid($collection, $category, $product, $item, $productItemCost);

        $productItemCost->delete();

        return redirect()
            ->route('backend.collections.categories.products.items.show', [$collection, $category, $product, $item])
            ->with('success', 'Product item cost deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'value' => ['nullable', 'numeric', 'min:0', 'max:99999999.99'],
        ]);

        $data['value'] = number_format((float) ($data['value'] ?? 0), 2, '.', '');

        return $data;
    }

    private function ensureProductItemCostPathIsValid(Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemCost $productItemCost): void
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        abort_if($productItemCost->product_item_id !== (int) $item->id, 404);
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
