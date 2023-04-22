<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\VarExporter\VarExporter;

class CreateModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crm:modules:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Module for Crm';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modulesPath = base_path('modules');
        $stubModulePath = base_path('stubs/module');
        $name = str($this->argument('name'))->trim();
        $tagName = $name->snake('-')->__toString();
        $tableName = $name->snake()->pluralStudly()->__toString();
        $moduleName = $name->ucfirst()->__toString();
        $files = File::allFiles($stubModulePath);

        $modulePath = str(implode(DIRECTORY_SEPARATOR, [
            $modulesPath,
            $moduleName,
        ]))->__toString();

        if (File::exists($modulePath)) {
            if ($this->askWithCompletion('Are you sure you want to continue with this process? The directory will be deleted', ['yes', 'no'], 'no') === 'yes') {
                File::deleteDirectory($modulePath);
                $this->manageConfig($moduleName, $name->__toString(), true);
            }
        }

        foreach ($files as $file) {
            try {
                $moduleFileName = str(implode(DIRECTORY_SEPARATOR, [
                    $modulePath,
                    $file->getRelativePathname(),
                ]))
                    ->replace('{name}', $moduleName)
                    ->replace('{tag}', $tagName)
                    ->replace('{table}', $tableName)
                    ->replace('composer.stub', 'composer.json')
                    ->replace('stub', 'php')
                    ->__toString();

                $content = str(file_get_contents($file->getPathname()))
                    ->replace('{name}', $moduleName)
                    ->replace('{tag}', $tagName)
                    ->replace('{table}', $tableName)
                    ->__toString();

                $path = str($file->getPath())
                    ->replace($stubModulePath, $modulePath)->__toString();
                File::makeDirectory($path, 0777, true, true);
                file_put_contents($moduleFileName, $content);
            } catch (\Exception|\Error|\RuntimeException $e) {
                $this->error($e->getMessage());
            }
        }

        $this->manageConfig($moduleName, $name->__toString());

        shell_exec('composer dump-autoload');
    }

    public function manageConfig(string $moduleName, bool $remove = false)
    {
        $configFilePath = config_path('modules.php');
        $configContent = config('modules');
        $provider = "\\Modules\\{$moduleName}\\{$moduleName}ServiceProvider";

        if ($remove && in_array($provider, $configContent['register'])) {
            unset($configContent['register'][$provider]);
        } else {
            $configContent['register'][] = $provider;
        }

        $newConfigContent = '<?php'.PHP_EOL.PHP_EOL.'return '.VarExporter::export($configContent).';';
        file_put_contents($configFilePath, $newConfigContent);

        $this->registerModules($moduleName, $remove);
    }

    public function registerModules(string $moduleName, bool $remove = false)
    {
        $configFilePath = config_path('filament.php');
        $configContent = config('filament');
        $provider = "\\Modules\\{$moduleName}\\Filament\\{$moduleName}Resource";

        if ($remove && in_array($provider, $configContent['resources']['register'])) {
            unset($configContent['resources']['register'][$provider]);
        } else {
            $configContent['resources']['register'][] = $provider;
        }

        $newConfigContent = '<?php'.PHP_EOL.PHP_EOL.'return '.VarExporter::export($configContent).';';
        file_put_contents($configFilePath, $newConfigContent);
    }
}
