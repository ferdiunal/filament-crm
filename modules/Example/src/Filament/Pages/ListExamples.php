<?php

declare(strict_types=1);

namespace Modules\Example\Filament\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Example\Filament\ExampleResource;

class ListExamples extends ListRecords
{
    protected static string $resource = ExampleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
