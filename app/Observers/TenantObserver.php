<?php

namespace App\Observers;

use App\Jobs\ModuleMigrate;
use App\Jobs\ModuleMigrateRollback;
use App\Models\Tenant;

class TenantObserver
{
    /**
     * Handle the Tenant "created" event.
     */
    public function created(Tenant $tenant): void
    {
        //
    }

    /**
     * Handle the Tenant "updated" event.
     */
    public function saving(Tenant $tenant): void
    {

        $removeModules = array_diff(
            $tenant->getOriginal()['modules'] ?? [],
            $tenant->modules
        );

        $addModules = array_diff(
            $tenant->modules,
            $tenant->getOriginal()['modules'] ?? [],
        );

        ModuleMigrateRollback::dispatch(
            $tenant,
            $removeModules
        );

        if (! empty($addModules)) {
            ModuleMigrate::dispatch($tenant);
        }
    }

    /**
     * Handle the Tenant "deleted" event.
     */
    public function deleted(Tenant $tenant): void
    {
        //
    }

    /**
     * Handle the Tenant "restored" event.
     */
    public function restored(Tenant $tenant): void
    {
        //
    }

    /**
     * Handle the Tenant "force deleted" event.
     */
    public function forceDeleted(Tenant $tenant): void
    {
        //
    }
}
