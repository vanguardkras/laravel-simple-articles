<?php

namespace Vanguardkras\LaravelSimpleArticles\Http\Providers;

use Illuminate\Support\ServiceProvider;

class SimpleArticlesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../migrations/2020_03_02_051531_simple_articles.php');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/routes.php');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'articles');
        $this->loadViewsFrom(__DIR__.'/../../views', 'articles');

        $this->mergeConfigFrom(
            __DIR__.'/../../config/articles.php', 'articles'
        );

        $this->publishes([
            __DIR__ . '/../../config/articles.php' => config_path('articles.php'),
        ], 'articles_config');

        $this->publishes([
            __DIR__ . '/../../public/lang/summernote-ru-RU.js' =>
                public_path('vendor/articles/lang/summernote-ru-RU.js'),
        ], 'articles_public');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/articles'),
        ], 'articles_translations');

        $this->publishes([
            __DIR__ . '/../../views' => resource_path('views/vendor/articles'),
        ], 'articles_views');
    }
}
