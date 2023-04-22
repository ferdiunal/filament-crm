<?php

return [
    'path' => '/',
    'core_path' => 'filament',
    'domain' => null,
    'home_url' => '/',
    'brand' => 'Laravel',
    'auth' => [
        'guard' => 'web',
        'pages' => [
            'login' => 'Filament\\Http\\Livewire\\Auth\\Login',
        ],
    ],
    'pages' => [
        'namespace' => 'App\\Filament\\Pages',
        'path' => '/Users/ferdiunal/apps/crm/app/Filament/Pages',
        'register' => [
            'Filament\\Pages\\Dashboard',
        ],
    ],
    'resources' => [
        'namespace' => 'App\\Filament\\Resources',
        'path' => '/Users/ferdiunal/apps/crm/app/Filament/Resources',
        'register' => [
            '\\Modules\\Example\\Filament\\ExampleResource',
        ],
    ],
    'widgets' => [
        'namespace' => 'App\\Filament\\Widgets',
        'path' => '/Users/ferdiunal/apps/crm/app/Filament/Widgets',
        'register' => [
            'Filament\\Widgets\\AccountWidget',
            'Filament\\Widgets\\FilamentInfoWidget',
        ],
    ],
    'livewire' => [
        'namespace' => 'App\\Filament',
        'path' => '/Users/ferdiunal/apps/crm/app/Filament',
    ],
    'dark_mode' => false,
    'database_notifications' => [
        'enabled' => false,
        'polling_interval' => '30s',
    ],
    'broadcasting' => [],
    'layout' => [
        'actions' => [
            'modal' => [
                'actions' => [
                    'alignment' => 'left',
                ],
            ],
        ],
        'forms' => [
            'actions' => [
                'alignment' => 'left',
                'are_sticky' => false,
            ],
            'have_inline_labels' => false,
        ],
        'footer' => [
            'should_show_logo' => true,
        ],
        'max_content_width' => null,
        'notifications' => [
            'vertical_alignment' => 'top',
            'alignment' => 'right',
        ],
        'sidebar' => [
            'is_collapsible_on_desktop' => false,
            'groups' => [
                'are_collapsible' => true,
            ],
            'width' => null,
            'collapsed_width' => null,
        ],
    ],
    'favicon' => null,
    'default_avatar_provider' => 'Filament\\AvatarProviders\\UiAvatarsProvider',
    'default_filesystem_disk' => 'public',
    'google_fonts' => 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap',
    'middleware' => [
        'auth' => [
            'Filament\\Http\\Middleware\\Authenticate',
        ],
        'base' => [
            'Illuminate\\Cookie\\Middleware\\EncryptCookies',
            'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
            'Illuminate\\Session\\Middleware\\StartSession',
            'Illuminate\\Session\\Middleware\\AuthenticateSession',
            'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
            'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
            'Illuminate\\Routing\\Middleware\\SubstituteBindings',
            'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
            'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
        ],
    ],
];