<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\Collection;

class CollectionController
{
    use HandlesImageValidation;

    public function index()
    {
        $items = Collection::latest()->paginate(10);

        return view('backend::collections.index', compact('items'));
    }

    public function create()
    {
        return view('backend::collections.create', [
            'collection' => new Collection([
                'show_in_store' => true,
                'show_in_menu' => true,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['image'] = $this->storeImage($request);

        Collection::create($data);

        return redirect()
            ->route('backend.collections.index')
            ->with('success', 'Collection created successfully.');
    }

    public function edit(Collection $collection)
    {
        return view('backend::collections.edit', compact('collection'));
    }

    public function show(Collection $collection)
    {
        $categories = $collection->categories()
            ->orderBy('category_order')
            ->latest()
            ->paginate(10);

        return view('backend::collections.show', compact('collection', 'categories'));
    }

    public function update(Request $request, Collection $collection)
    {
        $data = $this->validatedData($request, $collection);

        if ($request->hasFile('image')) {
            $this->deleteImage($collection->image);
            $data['image'] = $this->storeImage($request);
        }

        $collection->update($data);

        return redirect()
            ->route('backend.collections.index')
            ->with('success', 'Collection updated successfully.');
    }

    public function destroy(Collection $collection)
    {
        $this->deleteImage($collection->image);
        $collection->delete();

        return redirect()
            ->route('backend.collections.index')
            ->with('success', 'Collection deleted successfully.');
    }

    private function validatedData(Request $request, ?Collection $collection = null): array
    {
        $collectionId = $collection?->id;

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
                Rule::unique('collections', 'slug')->ignore($collectionId),
            ],
            'description' => ['nullable', 'string'],
            'image' => $this->imageRules(),
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'show_in_store' => ['nullable', 'boolean'],
            'show_in_menu' => ['nullable', 'boolean'],
        ]);

        unset($data['image']);

        $data['show_in_store'] = $request->boolean('show_in_store');
        $data['show_in_menu'] = $request->boolean('show_in_menu');

        return $data;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/collections');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('image');
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/collections/'.$filename;
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
}
