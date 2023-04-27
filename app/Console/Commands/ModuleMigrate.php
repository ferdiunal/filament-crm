<?php

namespace App\Console\Commands;

use App\Jobs\ModuleMigrate as JobsModuleMigrate;
use App\Models\Tenant;
use Illuminate\Console\Command;

class ModuleMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crm:modules:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations for module(s)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Tenant::query()->get()->each(
            fn (Tenant $tenant) => JobsModuleMigrate::dispatch($tenant)
        );
    }
}
