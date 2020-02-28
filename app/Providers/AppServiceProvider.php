<?php

namespace App\Providers;

use App\Models\Cake;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Role\RoleRepositoryInterface::class,
            \App\Repositories\Role\RoleRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\cake\CakeRepositoryInterface::class,
            \App\Repositories\cake\CakeRepository::class
        );
        $this->app->singleton(
            \App\Repositories\image\ImageRepositoryInterface::class,
            \App\Repositories\image\ImageRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Permission\PermissionRepositoryInterface::class,
            \App\Repositories\Permission\PermissionRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->categories = Category::all();
      
        View::share('categories', $this->categories);
    }
}
