<?php

namespace App\Providers;

use App\Repositories\Contracts\ItemRepositoryContract;
use App\Repositories\ItemRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
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
        $this->app->bind(ItemRepositoryContract::class, ItemRepository::class);
    }
}
