<?php namespace App\Okapien\Facades;

use Illuminate\Support\Facades\Facade;

class Privilege extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'privilege';
    }
}