<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Stancl\Tenancy\Contracts;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as ModelsTenant;

class Tenant extends ModelsTenant implements Contracts\TenantWithDatabase
{
    use HasUlids;
    use HasDatabase, HasDomains;

    protected $fillable = [
        'name',
        'email',
        'modules',
        'password',
        'trial_ends_at',
    ];

    protected $casts = [
        'modules' => 'array',
        'trial_ends_at' => 'datetime',
    ];

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'email',
            'modules',
            'password',
            'trial_ends_at',
        ];
    }

    public function domains() :HasMany
    {
        return $this->hasMany(Domain::class);
    }
}
