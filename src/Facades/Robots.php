<?php namespace Arcanedev\Robots\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class     Robots
 *
 * @package  Arcanedev\Robots\Facades
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Robots extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'arcanedev.robots'; }
}
