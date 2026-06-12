<?php

namespace Modules\Backend\Http\Controllers\Concerns;

trait HandlesImageValidation
{
    private const IMAGE_MAX_KILOBYTES = 10240;

    /**
     * @return array<int, string>
     */
    private function imageRules(bool $required = false): array
    {
        return [
            $required ? 'required' : 'nullable',
            'image',
            'mimes:jpg,jpeg,png,webp,gif',
            'max:'.self::IMAGE_MAX_KILOBYTES,
        ];
    }
}
