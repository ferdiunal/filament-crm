<?php

declare(strict_types=1);

namespace Modules\Example\Filament\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Example\Filament\ExampleResource;

class EditExample extends EditRecord
{
    protected static string $resource = ExampleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
