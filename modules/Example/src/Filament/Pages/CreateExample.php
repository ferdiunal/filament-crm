<?php

declare(strict_types=1);

namespace Modules\Example\Filament\Pages;

use Modules\Example\Filament\ExampleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExample extends CreateRecord
{
    protected static string $resource = ExampleResource::class;
}
