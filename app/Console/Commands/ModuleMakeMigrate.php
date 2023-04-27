<?php

namespace App\Console\Commands;

use App\Jobs\ModuleMigration;
use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ModuleMakeMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crm:modules:make:migrate {name : The name of the migration} {--module= : Module name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration file for module(s)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $module = base_path(
            sprintf("modules/%s/database/migrations", $this->option('module'))
        );
        
        $output = $this->call('make:migration', [
            'name' => $this->argument('name'),
            '--path' => $module,
            '--realpath' => true,
        ]);

        $this->line($output);
    }
}
