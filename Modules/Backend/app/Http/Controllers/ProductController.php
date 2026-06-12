<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\Category;
use Modules\Backend\Models\Collection;
use Modules\Backend\Models\Product;

class ProductController
{
    use HandlesImageValidation;

    public function create(Collection $collection, Category $category)
    {
        $this->ensureCategoryBelongsToCollection($collection, $category);

        return view('backend::products.create', [
            'collection' => $collection,
            'category' => $category,
            'product' => new Product([
                'manual_order' => 0,
                'taxes' => 0,
                'show_in_store' => true,
                'show_in_menu' => true,
            ]),
        ]);
    }

    public function store(Request $request, Collection $collection, Category $category)
    {
        $this->ensureCategoryBelongsToCollection($collection, $category);

        $data = $this->validatedData($request);
        $data['image'] = $this->storeImage($request);

        $category->products()->create($data);

        return redirect()
            ->route('backend.collections.categories.show', [$collection, $category])
            ->with('success', 'Product created successfully.');
    }

    public function show(Collection $collection, Category $category, Product $product)
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        $productImages = $product->images()
            ->orderBy('product_order')
            ->latest()
            ->paginate(10, ['*'], 'images_page');

        $productItems = $product->items()
            ->with(['color', 'size'])
            ->orderBy('manual_order')
            ->latest()
            ->paginate(10, ['*'], 'items_page');

        return view('backend::products.show', compact('collection', 'category', 'product', 'productImages', 'productItems'));
    }

    public function edit(Collection $collection, Category $category, Product $product)
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        return view('backend::products.edit', compact('collection', 'category', 'product'));
    }

    public function update(Request $request, Collection $collection, Category $category, Product $product)
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        $data = $this->validatedData($request, $product);

        if ($request->hasFile('image')) {
            $this->deleteImage($product->image);
            $data['image'] = $this->storeImage($request);
        }

        $product->update($data);

        return redirect()
            ->route('backend.collections.categories.show', [$collection, $category])
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Collection $collection, Category $category, Product $product)
    {
        $this->ensureProductPathIsValid($collection, $category, $product);

        $this->deleteImage($product->image);
        $product->delete();

        return redirect()
            ->route('backend.collections.categories.show', [$collection, $category])
            ->with('success', 'Product deleted successfully.');
    }

    private function validatedData(Request $request, ?Product $product = null): array
    {
        $productId = $product?->id;

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
                Rule::unique('products', 'slug')->ignore($productId),
            ],
            'description' => ['nullable', 'string'],
            'image' => $this->imageRules(),
            'show_in_store' => ['nullable', 'boolean'],
            'show_in_menu' => ['nullable', 'boolean'],
            'product_code' => ['nullable', 'string', 'max:255'],
            'manual_order' => ['nullable', 'integer', 'min:0'],
            'taxes' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
        ]);

        unset($data['image']);

        $data['manual_order'] = (int) ($data['manual_order'] ?? 0);
        $data['taxes'] = number_format((float) ($data['taxes'] ?? 0), 2, '.', '');
        $data['show_in_store'] = $request->boolean('show_in_store');
        $data['show_in_menu'] = $request->boolean('show_in_menu');

        return $data;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/products');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('image');
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/products/'.$filename;
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
