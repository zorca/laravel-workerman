<?php

namespace Zorca\LaravelWorkerman\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelWorkerman extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-workerman';
    }
}
