<?php

namespace Epajarito\CatalogosSat;
use Illuminate\Support\ServiceProvider;
class CatalogosSatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(
            $this->basePath('database/migrations')
        );

        $this->publishes([
            $this->basePath('storage/app/public') => storage_path('app/public')
        ], 'catalogos-sat-dir');
    }

    public function register()
    {
        $commands = ['Epajarito\\CatalogosSat\\Console\\Commands\\InsertCatalogsSat'];
        $this->commands($commands);
    }

    private function basePath($path)
    {
        return __DIR__ . '/../' . $path;
    }
}
