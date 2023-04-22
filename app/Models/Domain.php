<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Stancl\Tenancy\Database\Models\Domain as ModelsDomain;

class Domain extends ModelsDomain
{
    use HasUlids;
}
