<?php

declare(strict_types=1);

namespace Modules\Example\Filament\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Example\Filament\ExampleResource;

class CreateExample extends CreateRecord
{
    protected static string $resource = ExampleResource::class;
}
