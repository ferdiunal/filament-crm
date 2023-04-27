<?php

namespace App\Observers;

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
            $tenant->getOriginal()['modules'],
            $tenant->modules
        );
        
        ModuleMigrateRollback::dispatch(
            $tenant,
            $removeModules
        );
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
