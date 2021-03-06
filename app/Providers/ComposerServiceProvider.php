<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Tag;
use App\Article;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout', function($view) {

            $categories = Category::orderBy('title')->get();
            $popular_articles = Article::orderBy('views', 'DESC')->take(5)->get();
            $tags = Tag::whereHas('articles')->orderBy('title')->get();

            $view->with(compact('categories', 'popular_articles', 'tags'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
