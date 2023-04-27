<?php

namespace App\Jobs;

use App\Models\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Contracts\TenantWithDatabase;

class ModuleMigrateRollback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly TenantWithDatabase $tenant,
        private readonly array $removeModules = []
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (! empty($this->removeModules)) {
            $this->tenant->run(
                function (Tenant $tenant) {
                    foreach ($this->removeModules as $module) {
                        Artisan::call('migrate:rollback', [
                            '--force' => true, // This needs to be true to run migrations in production.
                            '--path' => [base_path("modules/{$module::$name}/database/migrations")],
                            '--realpath' => true,
                        ]);
                    }
                }
            );
        }
    }
}
