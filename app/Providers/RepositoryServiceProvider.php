<?php

namespace App\Providers;

use App\Contracts\RepositoryInterface;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use Sindria\Traits\InformationFromRoute;

class RepositoryServiceProvider extends ServiceProvider
{
    use InformationFromRoute;

    /**
     * List of keys of model name and it's repositories
     */
    private $repositories = [
        'customer' => \Sindria\Repositories\CustomerRepository::class,
        'user' => \Sindria\Repositories\UserRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, function ($app) {
            $model_name = Route::getModelName();

            if($model_name && isset($this->repositories[$model_name])) {
                return $app->make($this->repositories[$model_name]);
            }
        });
    }
}
