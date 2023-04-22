<?php

declare(strict_types=1);

namespace Modules\Example\Filament\Pages;

use Modules\Example\Filament\ExampleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

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
