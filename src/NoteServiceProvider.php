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
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations'),
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
