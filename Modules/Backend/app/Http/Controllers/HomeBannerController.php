<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\HomeBanner;

class HomeBannerController
{
    use HandlesImageValidation;

    public function index()
    {
        $items = HomeBanner::orderBy('image_order')->latest()->paginate(10);

        return view('backend::home-banners.index', compact('items'));
    }

    public function create()
    {
        return view('backend::home-banners.create', [
            'homeBanner' => new HomeBanner(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['image'] = $this->storeImage($request);

        HomeBanner::create($data);

        return redirect()
            ->route('backend.home-banners.index')
            ->with('success', 'Home banner created successfully.');
    }

    public function edit(HomeBanner $homeBanner)
    {
        return view('backend::home-banners.edit', compact('homeBanner'));
    }

    public function update(Request $request, HomeBanner $homeBanner)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($homeBanner->image);
            $data['image'] = $this->storeImage($request);
        }

        $homeBanner->update($data);

        return redirect()
            ->route('backend.home-banners.index')
            ->with('success', 'Home banner updated successfully.');
    }

    public function destroy(HomeBanner $homeBanner)
    {
        $this->deleteImage($homeBanner->image);
        $homeBanner->delete();

        return redirect()
            ->route('backend.home-banners.index')
            ->with('success', 'Home banner deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => $this->imageRules(),
            'image_order' => ['nullable', 'integer'],
            'button' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:2048'],
        ]);

        unset($data['image']);

        return $data;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/home-banners');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('image');
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/home-banners/'.$filename;
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
