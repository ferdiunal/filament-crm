<?php

declare(strict_types=1);

namespace Modules\Example\Filament\Pages;

use Modules\Example\Filament\ExampleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

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
