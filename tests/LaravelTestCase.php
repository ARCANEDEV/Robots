<?php namespace Arcanedev\Robots\Tests;

use Orchestra\Testbench\TestCase;

/**
 * Class LaravelTestCase
 * @package Arcanedev\Robots\Tests
 */
abstract class LaravelTestCase extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();
    }
    public function tearDown()
    {
        parent::tearDown();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get package providers.
     *
     * @return array
     */
    protected function getPackageProviders()
    {
        return ['Arcanedev\\Robots\\Laravel\\ServiceProvider'];
    }

    /**
     * Get package aliases.
     *
     * @return array
     */
    protected function getPackageAliases()
    {
        return [
            'Robots' => 'Arcanedev\\Robots\\Laravel\\Facade'
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
    }
}
