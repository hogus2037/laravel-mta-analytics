<?php

namespace Hogus\LaravelMtaAnalytics\Facade;

use Illuminate\Support\Facades\Facade;

class MTA extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'mta';
    }
}
