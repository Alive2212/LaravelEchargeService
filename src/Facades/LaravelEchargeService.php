<?php

namespace Alive2212\LaravelEchargeService\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelEchargeService extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelechargeservice';
    }
}
