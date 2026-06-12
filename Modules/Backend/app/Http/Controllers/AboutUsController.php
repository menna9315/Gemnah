<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\AboutUs;

class AboutUsController
{
    use HandlesImageValidation;

    public function index()
    {
        $items = AboutUs::orderBy('paragraph_order')->latest()->paginate(10);

        return view('backend::about-us.index', compact('items'));
    }

    public function create()
    {
        return view('backend::about-us.create', [
            'aboutUs' => new AboutUs(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['image'] = $this->storeImage($request, 'image');
        $data['image2'] = $this->storeImage($request, 'image2');

        AboutUs::create($data);

        return redirect()
            ->route('backend.about-us.index')
            ->with('success', 'About us item created successfully.');
    }

    public function edit(AboutUs $aboutUs)
    {
        return view('backend::about-us.edit', compact('aboutUs'));
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        $data = $this->validatedData($request);

        foreach (['image', 'image2'] as $field) {
            if ($request->hasFile($field)) {
                $this->deleteImage($aboutUs->{$field});
                $data[$field] = $this->storeImage($request, $field);
            }
        }

        $aboutUs->update($data);

        return redirect()
            ->route('backend.about-us.index')
            ->with('success', 'About us item updated successfully.');
    }

    public function destroy(AboutUs $aboutUs)
    {
        $this->deleteImage($aboutUs->image);
        $this->deleteImage($aboutUs->image2);
        $aboutUs->delete();

        return redirect()
            ->route('backend.about-us.index')
            ->with('success', 'About us item deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'paragraph_order' => ['nullable', 'integer'],
            'image' => $this->imageRules(),
            'image2' => $this->imageRules(),
            'button_title' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:2048'],
        ]);

        unset($data['image'], $data['image2']);

        return $data;
    }

    private function storeImage(Request $request, string $field): ?string
    {
        if (! $request->hasFile($field)) {
            return null;
        }

        $directory = public_path('uploads/about-us');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file($field);
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/about-us/'.$filename;
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
