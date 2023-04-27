<?php

declare(strict_types=1);

namespace Modules\Example\Filament\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Modules\Example\Filament\ExampleResource;

class ViewExample extends ViewRecord
{
    protected static string $resource = ExampleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
