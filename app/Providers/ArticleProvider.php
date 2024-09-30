<?php

namespace App\Providers;

use App\Service\ArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ArticleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ArticleService::class, function (Application $app) {
            return new ArticleService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): array
    {
        return [ArticleService::class];
    }
}
