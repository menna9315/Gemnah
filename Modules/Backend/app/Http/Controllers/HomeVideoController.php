<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Backend\Models\HomeVideo;

class HomeVideoController
{
    private const VIDEO_MAX_KILOBYTES = 102400;

    public function index()
    {
        $homeVideo = HomeVideo::oldest()->first();

        return view('backend::home-videos.index', compact('homeVideo'));
    }

    public function create()
    {
        if ($homeVideo = HomeVideo::oldest()->first()) {
            return redirect()->route('backend.home-videos.edit', $homeVideo);
        }

        return view('backend::home-videos.create', [
            'homeVideo' => new HomeVideo([
                'display_at_home' => true,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $homeVideo = HomeVideo::oldest()->first();
        $data = $this->validatedData($request);

        if ($request->hasFile('video')) {
            $this->deleteVideo($homeVideo?->video);
            $data['video'] = $this->storeVideo($request);
        }

        if ($homeVideo) {
            $homeVideo->update($data);

            return redirect()
                ->route('backend.home-videos.edit', $homeVideo)
                ->with('success', 'Home video updated successfully.');
        }

        HomeVideo::create($data);

        return redirect()
            ->route('backend.home-videos.index')
            ->with('success', 'Home video created successfully.');
    }

    public function edit(HomeVideo $homeVideo)
    {
        return view('backend::home-videos.edit', compact('homeVideo'));
    }

    public function update(Request $request, HomeVideo $homeVideo)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('video')) {
            $this->deleteVideo($homeVideo->video);
            $data['video'] = $this->storeVideo($request);
        }

        $homeVideo->update($data);

        return redirect()
            ->route('backend.home-videos.index')
            ->with('success', 'Home video updated successfully.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'video' => $this->videoRules(),
            'display_at_home' => ['nullable', 'boolean'],
        ]);

        unset($data['video']);

        $data['display_at_home'] = $request->boolean('display_at_home');

        return $data;
    }

    /**
     * @return array<int, string>
     */
    private function videoRules(): array
    {
        return [
            'nullable',
            'file',
            'mimes:mp4,mov,avi,webm,mkv',
            'max:'.self::VIDEO_MAX_KILOBYTES,
        ];
    }

    private function storeVideo(Request $request): ?string
    {
        if (! $request->hasFile('video')) {
            return null;
        }

        $directory = public_path('uploads/home-videos');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('video');
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($directory, $filename);

        return 'uploads/home-videos/'.$filename;
    }

    private function deleteVideo(?string $path): void
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
