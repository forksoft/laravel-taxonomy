<?php

namespace Fomvasss\Taxonomy;

use Illuminate\Support\ServiceProvider;

class TaxonomyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishedConfig();

        $this->makeMigrations();

        $this->makeSeeder();

        $this->makeModels();

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\TaxonomyPublish::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/taxonomy-seeder.php', 'taxonomy-seeder.php');
    }

    protected function publishedConfig()
    {
        $configPath = __DIR__ . '/../config/taxonomy-seeder.php';
        $this->publishes([$configPath => config_path('taxonomy-seeder.php')], 'config');
    }

    protected function makeSeeder()
    {
        $seedPath = __DIR__ . '/../database/seeds/TaxonomyTableSeeder.php.stub';
        $this->publishes([$seedPath => database_path('seeds/TaxonomyTableSeeder.php')], 'seeder');
    }

    protected function makeMigrations()
    {
        if (! class_exists('CreateTaxonomiesTable')) {
            $timestamp = date('Y_m_d_His', time());

            $migrationPath = __DIR__.'/../database/migrations/create_taxonomies_table.php.stub';
            $this->publishes([$migrationPath => database_path('/migrations/' . $timestamp . '_create_taxonomies_table.php'),
            ], 'migration');
        }
    }

    protected function makeModels()
    {
        $modelPathStub = __DIR__.'/stubs/models/';
        $modelPath = $this->checkMakeDir(app_path('Models')) . '/';

        if (! class_exists('App\Models\Term') || ! class_exists('App\Models\Vocabulary')) {
            $this->publishes([
                $modelPathStub . 'Term.php.stub' => $modelPath . 'Term.php',
                $modelPathStub . 'Vocabulary.php.stub' => $modelPath . 'Vocabulary.php',
            ], 'models');
        }
    }

    protected function checkMakeDir(string $path)
    {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        return $path;
    }
}
