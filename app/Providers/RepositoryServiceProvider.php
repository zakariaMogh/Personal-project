<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repos = [
        \App\Contracts\CategoryContract::class => \App\Repositories\CategoryRepository::class,
        \App\Contracts\UserContract::class => \App\Repositories\UserRepository::class,
        \App\Contracts\PostContract::class => \App\Repositories\PostRepository::class,
        \App\Contracts\CommentContract::class => \App\Repositories\CommentRepository::class,

    ];

    /**
     * Register services.
     *
     * @return void
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
        foreach ($this->repos as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }
}
