<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\OrderObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\FrontPageComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        User::observe(UserObserver::class);
          Category::observe(CategoryObserver::class);
//          Order::observe(OrderObserver::class);

        View::composer('navigation', FrontPageComposer::class);
        Paginator::defaultView('vendor.pagination.default');
    }
}
