<?php

declare(strict_types=1);

namespace Modules\Example;

use Filament\PluginServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Spatie\LaravelPackageTools\Package;
use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Events\TenantCreated;

class ExampleServiceProvider extends ServiceProvider
{
    public static string $name = 'Example';

    public static string $tag = 'example';

    protected array $resources = [
        \Modules\Example\Filament\ExampleResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        // 'plugin-skeleton' => __DIR__.'/../resources/dist/skeleton.css',
    ];

    protected array $scripts = [
        // 'plugin-skeleton' => __DIR__.'/../resources/dist/skeleton.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-skeleton' => __DIR__ . '/../resources/dist/skeleton.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'example');

        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'example');
    }

    public function register()
    {
        //
    }
}