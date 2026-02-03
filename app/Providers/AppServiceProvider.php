<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProjectRepository;
use App\Interfaces\ProjectRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.header', function ($view) {
            $categories = Category::where('status', 1)->with('subCategories')->get();
            $view->with('categories', $categories);
        });
    }
}
