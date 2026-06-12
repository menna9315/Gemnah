<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\Category;
use Modules\Backend\Models\Collection;

class CategoryController
{
    use HandlesImageValidation;

    public function create(Collection $collection)
    {
        return view('backend::categories.create', [
            'collection' => $collection,
            'category' => new Category([
                'category_order' => 0,
                'show_in_store' => true,
                'show_in_menu' => true,
            ]),
        ]);
    }

    public function store(Request $request, Collection $collection)
    {
        $data = $this->validatedData($request);
        $data['image'] = $this->storeImage($request);

        $collection->categories()->create($data);

        return redirect()
            ->route('backend.collections.show', $collection)
            ->with('success', 'Category created successfully.');
    }

    public function show(Collection $collection, Category $category)
    {
        $this->ensureCategoryBelongsToCollection($collection, $category);

        $products = $category->products()
            ->orderBy('manual_order')
            ->latest()
            ->paginate(10);

        return view('backend::categories.show', compact('collection', 'category', 'products'));
    }

    public function edit(Collection $collection, Category $category)
    {
        $this->ensureCategoryBelongsToCollection($collection, $category);

        return view('backend::categories.edit', compact('collection', 'category'));
    }

    public function update(Request $request, Collection $collection, Category $category)
    {
        $this->ensureCategoryBelongsToCollection($collection, $category);

        $data = $this->validatedData($request, $category);

        if ($request->hasFile('image')) {
            $this->deleteImage($category->image);
            $data['image'] = $this->storeImage($request);
        }

        $category->update($data);

        return redirect()
            ->route('backend.collections.show', $collection)
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Collection $collection, Category $category)
    {
        $this->ensureCategoryBelongsToCollection($collection, $category);

        $this->deleteImage($category->image);
        $category->delete();

        return redirect()
            ->route('backend.collections.show', $collection)
            ->with('success', 'Category deleted successfully.');
    }

    private function validatedData(Request $request, ?Category $category = null): array
    {
        $categoryId = $category?->id;

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
                Rule::unique('categories', 'slug')->ignore($categoryId),
            ],
            'category_order' => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => $this->imageRules(),
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'show_in_store' => ['nullable', 'boolean'],
            'show_in_menu' => ['nullable', 'boolean'],
        ]);

        unset($data['image']);

        $data['category_order'] = (int) ($data['category_order'] ?? 0);
        $data['show_in_store'] = $request->boolean('show_in_store');
        $data['show_in_menu'] = $request->boolean('show_in_menu');

        return $data;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/categories');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('image');
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/categories/'.$filename;
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

    private function ensureCategoryBelongsToCollection(Collection $collection, Category $category): void
    {
        abort_if($category->collection_id !== (int) $collection->id, 404);
    }
}
