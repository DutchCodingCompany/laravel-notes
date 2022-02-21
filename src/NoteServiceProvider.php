<?php

namespace DutchCodingCompany\Notes;

use Illuminate\Support\ServiceProvider;

class NoteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerMigrations();
        $this->registerConfig();
    }

    /**
     * Register the package migrations.
     *
     * @return void
     */
    protected function registerMigrations(): void
    {
        $folder = 'class_based';
        if (version_compare($this->app->version(), '8.38.0', '>=')) {
            $folder = 'anonymous';
        }

        $this->loadMigrationsFrom(__DIR__ . '/../migrations/'.$folder);

        $this->publishes([
            __DIR__ . '/../migrations/'.$folder => database_path('migrations'),
        ], 'notes');
    }

    /**
     * Register the package config.
     *
     * @return void
     */
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/notes.php', 'notes');

        $this->publishes([
            __DIR__ . '/../config/notes.php' => config_path('notes.php'),
        ], 'notes');
    }
}
