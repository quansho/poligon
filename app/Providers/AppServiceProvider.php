<?php

namespace App\Providers;

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\BlogPostLocation;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogPostLocationObserver;
use App\Observers\BlogPostObserver;
use App\Services\SocialUserResolver;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
//    public $bindings = [
//        SocialUserResolverInterface::class => SocialUserResolver::class,
//    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BlogPost::observe(BlogPostObserver::class);
        BlogPostLocation::observe(BlogPostLocationObserver::class);
        BlogPostCategory::observe(BlogCategoryObserver::class);
    }
}
