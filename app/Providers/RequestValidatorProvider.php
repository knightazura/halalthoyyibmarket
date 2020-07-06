<?php

namespace App\Providers;

use App\Contracts\RequestValidatorInterface;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class RequestValidatorProvider extends ServiceProvider
{
    private $validators = [
        'customer' => [
            'store-customer' => \App\Http\Requests\Customer\SaveCustomerRequest::class,
            'update-customer' => \App\Http\Requests\Customer\UpdateCustomer::class ,
        ]
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RequestValidatorInterface::class, function ($app) {
            $model_name = Route::getModelName();

            if ($model_name && isset($this->validators[$model_name])) {
                $action_name = Route::getProcessName();
                
                if ($action_name && isset($this->validators[$model_name][$action_name])) {
                    return $app->make($this->validators[$model_name][$action_name]);
                }
            }

            return $app->make(\Illuminate\Http\Request::class);
        });
    }
}
