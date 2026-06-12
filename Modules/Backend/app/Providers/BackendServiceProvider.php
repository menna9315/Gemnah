<?php

namespace Modules\Backend\Providers;

use Nwidart\Modules\Support\ModuleServiceProvider;

class BackendServiceProvider extends ModuleServiceProvider
{
    protected string $name = 'Backend';

    protected string $nameLower = 'backend';

    protected array $providers = [
        RouteServiceProvider::class,
    ];
}
