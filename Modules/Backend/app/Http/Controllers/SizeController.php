<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Backend\Http\Controllers\Concerns\HandlesImageValidation;
use Modules\Backend\Models\Size;

class SizeController
{
    use HandlesImageValidation;

    public function index()
    {
        $items = Size::latest()->paginate(10);

        return view('backend::sizes.index', compact('items'));
    }

    public function create()
    {
        return view('backend::sizes.create', [
            'size' => new Size(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['size_chart_image'] = $this->storeImage($request);

        Size::create($data);

        return redirect()
            ->route('backend.sizes.index')
            ->with('success', 'Size created successfully.');
    }

    public function show(Size $size)
    {
        return view('backend::sizes.show', compact('size'));
    }

    public function edit(Size $size)
    {
        return view('backend::sizes.edit', compact('size'));
    }

    public function update(Request $request, Size $size)
    {
        $data = $this->validatedData($request, $size);

        if ($request->hasFile('size_chart_image')) {
            $this->deleteImage($size->size_chart_image);
            $data['size_chart_image'] = $this->storeImage($request);
        }

        $size->update($data);

        return redirect()
            ->route('backend.sizes.index')
            ->with('success', 'Size updated successfully.');
    }

    public function destroy(Size $size)
    {
        $this->deleteImage($size->size_chart_image);
        $size->delete();

        return redirect()
            ->route('backend.sizes.index')
            ->with('success', 'Size deleted successfully.');
    }

    private function validatedData(Request $request, ?Size $size = null): array
    {
        $sizeId = $size?->id;

        $data = $request->validate([
            'value' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sizes', 'value')->ignore($sizeId),
            ],
            'size_chart_image' => $this->imageRules(),
        ]);

        unset($data['size_chart_image']);

        return $data;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('size_chart_image')) {
            return null;
        }

        $directory = public_path('uploads/sizes');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('size_chart_image');
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/sizes/'.$filename;
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
