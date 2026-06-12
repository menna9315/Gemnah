<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\Backend\Models\Color;

class ColorController
{
    public function index()
    {
        $items = Color::latest()->paginate(10);

        return view('backend::colors.index', compact('items'));
    }

    public function create()
    {
        return view('backend::colors.create', [
            'color' => new Color(['code' => '#000000']),
        ]);
    }

    public function store(Request $request)
    {
        Color::create($this->validatedData($request));

        return redirect()
            ->route('backend.colors.index')
            ->with('success', 'Color created successfully.');
    }

    public function show(Color $color)
    {
        return view('backend::colors.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('backend::colors.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $color->update($this->validatedData($request, $color));

        return redirect()
            ->route('backend.colors.index')
            ->with('success', 'Color updated successfully.');
    }

    public function destroy(Color $color)
    {
        $color->delete();

        return redirect()
            ->route('backend.colors.index')
            ->with('success', 'Color deleted successfully.');
    }

    private function validatedData(Request $request, ?Color $color = null): array
    {
        $colorId = $color?->id;

        $request->merge([
            'code' => strtoupper(trim((string) $request->input('code'))),
        ]);

        return $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('colors', 'name')->ignore($colorId),
            ],
            'code' => [
                'required',
                'string',
                'max:7',
                'regex:/^#[0-9A-F]{6}$/',
                Rule::unique('colors', 'code')->ignore($colorId),
            ],
        ]);
    }
}
