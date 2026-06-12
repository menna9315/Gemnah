<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\Category;
use Modules\Backend\Models\Collection;
use Modules\Backend\Models\Product;
use Modules\Backend\Models\ProductImage;

class ProductImageController
{
    use HandlesImageValidation;

    public function create(Collection $collection, Category $category, Product $product)
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        return view('backend::product-images.create', [
            'collection' => $collection,
            'category' => $category,
            'product' => $product,
            'productImage' => new ProductImage(['product_order' => 0]),
        ]);
    }

    public function store(Request $request, Collection $collection, Category $category, Product $product)
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        $data = $this->validatedData($request);
        $data['image'] = $this->storeImage($request);

        $product->images()->create($data);

        return redirect()
            ->route('backend.collections.categories.products.show', [$collection, $category, $product])
            ->with('success', 'Product image created successfully.');
    }

    public function show(Collection $collection, Category $category, Product $product, ProductImage $productImage)
    {
        $this->ensureProductImagePathIsValid($collection, $category, $product, $productImage);

        return view('backend::product-images.show', compact('collection', 'category', 'product', 'productImage'));
    }

    public function edit(Collection $collection, Category $category, Product $product, ProductImage $productImage)
    {
        $this->ensureProductImagePathIsValid($collection, $category, $product, $productImage);

        return view('backend::product-images.edit', compact('collection', 'category', 'product', 'productImage'));
    }

    public function update(Request $request, Collection $collection, Category $category, Product $product, ProductImage $productImage)
    {
        $this->ensureProductImagePathIsValid($collection, $category, $product, $productImage);

        $data = $this->validatedData($request, $productImage);

        if ($request->hasFile('image')) {
            $this->deleteImage($productImage->image);
            $data['image'] = $this->storeImage($request);
        }

        $productImage->update($data);

        return redirect()
            ->route('backend.collections.categories.products.show', [$collection, $category, $product])
            ->with('success', 'Product image updated successfully.');
    }

    public function destroy(Collection $collection, Category $category, Product $product, ProductImage $productImage)
    {
        $this->ensureProductImagePathIsValid($collection, $category, $product, $productImage);

        $this->deleteImage($productImage->image);
        $productImage->delete();

        return redirect()
            ->route('backend.collections.categories.products.show', [$collection, $category, $product])
            ->with('success', 'Product image deleted successfully.');
    }

    private function validatedData(Request $request, ?ProductImage $productImage = null): array
    {
        $data = $request->validate([
            'image' => $this->imageRules($productImage === null),
            'product_order' => ['nullable', 'integer', 'min:0'],
        ]);

        unset($data['image']);

        $data['product_order'] = (int) ($data['product_order'] ?? 0);

        return $data;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/product-images');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('image');
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/product-images/'.$filename;
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

    private function ensureProductImagePathIsValid(Collection $collection, Category $category, Product $product, ProductImage $productImage): void
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        abort_if($productImage->product_id !== (int) $product->id, 404);
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
