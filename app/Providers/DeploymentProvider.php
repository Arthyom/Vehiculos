<?php

namespace App\Providers;

use App\Models\DeploymentModel;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\ServiceProvider;

class DeploymentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(DeploymentProvider::class, function ()  {
            return new DeploymentProvider($this->app);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function runDeployment() : string {
        $d = new DeploymentModel();

        $localPath = '/home/frodo/Documents/Repos';
        $proddPath = '/home/frodo_lenovo/repos/scripts';

        $process = Process::path($proddPath);
        $out = $process->run('sh vehiculos_deploy.sh');
        return $out->output();
    }
}
