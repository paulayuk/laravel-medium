<?php

namespace PaulAyuk\laravel-medium\Facades;

use Illuminate\Support\Facades\Facade;

class laravel-medium extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-medium';
    }
}
