<?php

namespace Sindria\Helpers\Mixins;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

/**
 * Bunch of helpers that using route information
 */
class RouteMixins
{
    /**
     * Get model name key from route name with given format
     * @format mn:[key_of_model_name]
     * 
     * @return \Illuminate\Support\Collection
     */
    public function getModelName()
    {
        return function ($identifier = "mn:") {
            $extracted = collect(explode(".", Route::currentRouteName()))
                ->filter(function ($route_name, $key) use ($identifier) {
                    return Str::startsWith($route_name, $identifier);
                });

            return Str::substr($extracted->first(), Str::length($identifier));
        };
    }

    public function getProcessName()
    {
        return function ($identifier = "pc:") {
            if (!is_null($identifier)) {
                $extracted = collect(explode(".", Route::currentRouteName()))
                    ->filter(function ($route_name, $key) use ($identifier) {
                        return Str::startsWith($route_name, $identifier);
                    });

                return Str::substr($extracted->first(), Str::length($identifier));
            } else {
                return Str::lower(Route::currentRouteAction());
            }
        };
    }
}
