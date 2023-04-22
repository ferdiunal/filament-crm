<?php

declare(strict_types=1);

namespace App\Library;

use Illuminate\Support\Str;
use Stancl\Tenancy\Contracts\UniqueIdentifierGenerator;

class TenancyIdGenerator implements UniqueIdentifierGenerator
{
    public static function generate($resource): string
    {
        return Str::ulid()->__toString();
    }
}
