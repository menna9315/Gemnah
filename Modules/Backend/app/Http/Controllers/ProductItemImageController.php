<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\Category;
use Modules\Backend\Models\Collection;
use Modules\Backend\Models\Product;
use Modules\Backend\Models\ProductItem;
use Modules\Backend\Models\ProductItemImage;

class ProductItemImageController
{
    use HandlesImageValidation;

    public function create(Collection $collection, Category $category, Product $product, ProductItem $item)
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        return view('backend::product-item-images.create', [
            'collection' => $collection,
            'category' => $category,
            'product' => $product,
            'item' => $item,
            'productItemImage' => new ProductItemImage(['item_order' => 0]),
        ]);
    }

    public function store(Request $request, Collection $collection, Category $category, Product $product, ProductItem $item)
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        $data = $this->validatedData($request);
        $data['image'] = $this->storeImage($request);

        $item->itemImages()->create($data);

        return redirect()
            ->route('backend.collections.categories.products.items.show', [$collection, $category, $product, $item])
            ->with('success', 'Product item image created successfully.');
    }

    public function show(Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemImage $productItemImage)
    {
        $this->ensureProductItemImagePathIsValid($collection, $category, $product, $item, $productItemImage);

        return view('backend::product-item-images.show', compact('collection', 'category', 'product', 'item', 'productItemImage'));
    }

    public function edit(Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemImage $productItemImage)
    {
        $this->ensureProductItemImagePathIsValid($collection, $category, $product, $item, $productItemImage);

        return view('backend::product-item-images.edit', compact('collection', 'category', 'product', 'item', 'productItemImage'));
    }

    public function update(Request $request, Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemImage $productItemImage)
    {
        $this->ensureProductItemImagePathIsValid($collection, $category, $product, $item, $productItemImage);

        $data = $this->validatedData($request, $productItemImage);

        if ($request->hasFile('image')) {
            $this->deleteImage($productItemImage->image);
            $data['image'] = $this->storeImage($request);
        }

        $productItemImage->update($data);

        return redirect()
            ->route('backend.collections.categories.products.items.show', [$collection, $category, $product, $item])
            ->with('success', 'Product item image updated successfully.');
    }

    public function destroy(Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemImage $productItemImage)
    {
        $this->ensureProductItemImagePathIsValid($collection, $category, $product, $item, $productItemImage);

        $this->deleteImage($productItemImage->image);
        $productItemImage->delete();

        return redirect()
            ->route('backend.collections.categories.products.items.show', [$collection, $category, $product, $item])
            ->with('success', 'Product item image deleted successfully.');
    }

    private function validatedData(Request $request, ?ProductItemImage $productItemImage = null): array
    {
        $data = $request->validate([
            'image' => $this->imageRules($productItemImage === null),
            'item_order' => ['nullable', 'integer', 'min:0'],
        ]);

        unset($data['image']);

        $data['item_order'] = (int) ($data['item_order'] ?? 0);

        return $data;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/product-item-images');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('image');
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/product-item-images/'.$filename;
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

    private function ensureProductItemImagePathIsValid(Collection $collection, Category $category, Product $product, ProductItem $item, ProductItemImage $productItemImage): void
    {
        $this->ensureProductItemPathIsValid($collection, $category, $product, $item);

        abort_if($productItemImage->product_item_id !== (int) $item->id, 404);
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
