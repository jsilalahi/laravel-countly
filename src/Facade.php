<?php

namespace DynEd\Countly;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return Countly::class;
    }
}