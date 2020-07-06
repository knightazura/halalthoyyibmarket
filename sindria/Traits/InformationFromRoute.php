<?php

namespace Sindria\Traits;

use Illuminate\Support\Str;

/**
 * Bunch of helpers that using route information
 */
trait InformationFromRoute
{
    /**
     * Get model name key from route name with given format
     * @format mn:[key_of_model_name]
     * 
     * @return \Illuminate\Support\Collection
     */
    protected function getModelName($currentRoute, $identifier = "mn:")
    {
        $model_name = collect(explode(".", $currentRoute))
            ->filter(function ($route_name, $key) use ($identifier) {
                return Str::startsWith($route_name, $identifier);
            });

        return Str::substr($model_name->first(), 3);
    }
}
