<?php

namespace App\Providers;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Repository\VideoRepository;
use App\Repository\CommentRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Interface\PostRepositoryInterface;
use App\Repository\Interface\UserRepositoryInterface;
use App\Repository\Interface\VideoRepositoryInterface;
use App\Repository\Interface\CommentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(VideoRepositoryInterface::class, VideoRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
